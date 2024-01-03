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

class ApplicantController extends Controller
{
    //

    public function getApplicantById($id)
    {
        $applicant = User::with('userRole.role', 'userApplication.application.applicationsRecommendedSource')->find($id);
        $userTypes = UsersRole::with('user')->where('role_id', 2)->count();
        $adminTypes = UsersRole::with('user')->where('role_id', 1)->count();

        return view('applicantEdit', compact('applicant'));
    }

    public function updateApplicantById(Request $request, $id)
    {
        $applicant = User::find($id);
        $applicant->update($request->all());
        return response()->json($applicant);
    }

    public function deleteApplicantById($id)
    {

        $applicant = User::find($id);
        $userApplication = UsersApplication::find($id);
        $application = Application::find($userApplication->application_id);

        DB::beginTransaction();
        try {
            $applicant->delete();
            $userApplication->delete();
            $application->delete();
            DB::commit();
            return redirect('/home')->with('success', 'Applicant deleted successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
            return redirect('/home')->with('error', 'Applicant  delete failed!');
        }
    }

    //Search User By Input Field and Data

    public function searchApplicant(Request $request)
    {
        $search = $request->get('search');
        $searchField = $request->get('searchField');
        $applicants = User::where($searchField, 'LIKE', '%' . $search . '%')->paginate(10);
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
