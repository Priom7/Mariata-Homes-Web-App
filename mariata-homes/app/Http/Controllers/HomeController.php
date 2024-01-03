<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\ApplicationsRecommendedSource;
use App\Models\RecommendedSource;
use App\Models\User;
use App\Models\UserDetails;
use App\Models\UsersApplication;
use App\Models\UsersRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function checkAdmin()
    {

        $userRole = UsersRole::where('user_id', auth()->user()->id)->first();

        if ($userRole->role_id === 1) {

            return true;
        } else {

            return redirect()->route('applicant.profile');
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if ($this->checkAdmin() !== true) {
            return redirect()->route('applicant.profile')->with('error', 'You are not authorized to view this page');
        } else {

            $applicants = User::paginate(10);
            $applications = Application::with('applicationsRecommendedSource.recommendedSource')->paginate(10);
            $totalApplications = Application::count();
            $totalApplicants = User::count();
            $totalRecommendedSources = RecommendedSource::count();
            $totalPoliceRecommendation = ApplicationsRecommendedSource::where('recommended_source_id', 1)->count();
            $toalPrisonRecommendation = ApplicationsRecommendedSource::where('recommended_source_id', 2)->count();
            $totalImmigrationRecommendation = ApplicationsRecommendedSource::where('recommended_source_id', 3)->count();
            $totalOthersRecommendation = ApplicationsRecommendedSource::where('recommended_source_id', 4)->count();
            $userTypes = UsersRole::with('user')->where('role_id', 2)->count();
            $adminTypes = UsersRole::with('user')->where('role_id', 1)->count();
            return view('home', compact('applicants', 'applications', 'totalApplications', 'totalApplicants', 'totalRecommendedSources', 'totalPoliceRecommendation', 'toalPrisonRecommendation', 'totalImmigrationRecommendation', 'totalOthersRecommendation', 'userTypes', 'adminTypes'));
        }
    }



    public function adminSubmitApplication(Request $request)
    {

        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'dob' => 'required|date',
            'email' => 'nullable|email',
            'telephone' => 'nullable|string',
            'next_of_kin' => 'nullable|string',
            'age' => 'required|integer',
            'passport_photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'illness' => 'nullable|string',
            'last_residence_address' => 'nullable|string',
            'recommended_source_address' => 'required|string',
        ]);
        // Handle file upload
        if ($request->hasFile('passport_photo')) {
            $photoPath = $request->file('passport_photo')->store('photos', 'public');
            $validatedData['passport_photo'] = $photoPath;
        }

        DB::beginTransaction();
        try {

            Application::create($validatedData);

            UsersApplication::create([
                'user_id' => $request['user_id'],
                'application_id' => Application::latest()->first()->id,
            ]);

            ApplicationsRecommendedSource::create([
                'application_id' => Application::latest()->first()->id,
                'recommended_source_id' => (int) $request['recommended_source'],
            ]);


            DB::commit();
            return redirect('/home')->with('success', 'Application submitted successfully!');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with('error', 'An error occured while submitting your application');
        }
    }


    public function adminAddApplicationView()
    {
        $users = DB::table('users')
            ->leftJoin('users_applications', 'users.id', '=', 'users_applications.user_id')
            ->whereNull('users_applications.user_id')
            ->select('users.*')
            ->get();
        $recommendedSources = RecommendedSource::all();
        return view('addApplication', compact('users', 'recommendedSources'));
    }
}
