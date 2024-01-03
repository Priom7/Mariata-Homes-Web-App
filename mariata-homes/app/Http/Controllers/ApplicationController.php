<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\ApplicationsRecommendedSource;
use App\Models\RecommendedSource;
use App\Models\User;
use App\Models\UsersApplication;
use App\Models\UsersRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplicationController extends Controller
{
    //

    public function getApplicationById($id)
    {
        $application = Application::with('applicationsRecommendedSource.recommendedSource')->find($id);
        $recommendedSources = RecommendedSource::all();

        return view('applicationEdit', compact('application', 'recommendedSources'));
    }

    public function updateApplicationById(Request $request, $id)
    {
        $application = Application::find($id);
        $application->update($request->all());
        return response()->json($application);
    }

    public function deleteApplicationById($id)
    {
        $application = Application::find($id);
        $userApplication = UsersApplication::where("application_id", $application->id);
        DB::beginTransaction();
        try {
            $application->delete();
            $userApplication->delete();
            DB::commit();
            return redirect("/home")->with('success', 'Application deleted successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
            return redirect("/home")->with('error', 'Application  delete failed!');
        }
    }



    //Search User By Input Field and Data

    public function searchApplication(Request $request)
    {
        $search = $request->get('search');
        $searchField = $request->get('searchField');
        $applicants = User::paginate(10);
        $applications = Application::with('applicationsRecommendedSource.recommendedSource')->where($searchField, 'LIKE', '%' . $search . '%')->paginate(10);
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
