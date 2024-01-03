<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\ApplicationsRecommendedSource;
use App\Models\RecommendedSource;
use App\Models\Role;
use App\Models\User;
use App\Models\UsersApplication;
use App\Models\UsersRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;


class ApplicantProfileController extends Controller
{
    //

    public function index()
    {
        $user = User::with("userRole.role", 'userApplication.application.applicationsRecommendedSource.recommendedSource')->find(auth()->user()->id);
       
        $recommendedSources = RecommendedSource::all();
        return view('profile', compact('user', 'recommendedSources'));
    }

    public function submitApplication(Request $request)
    {


        $request['user_id'] = auth()->user()->id;
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
                'user_id' => auth()->user()->id,
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
}




