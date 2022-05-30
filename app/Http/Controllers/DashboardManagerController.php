<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Drf;
use App\Models\Ivsp;
use Illuminate\Http\Request;

class DashboardManagerController extends Controller
{
    public function index()
    {
        $ivspReviewManager = Ivsp::findIVSPReviewManager();
        $ivspApproveManager = Ivsp::findIVSPApproveManager();
        return view('dashboard', [
            'ivspReviewManager' => $ivspReviewManager,
            'ivspApproveManager' => $ivspApproveManager
        ]);
    }

    public function history()
    {
        return view('history.history');
    }

    public function ivspSOPReviewManager($id)
    {
        $ivsp = Ivsp::findIVSPById($id);
        return view('sop_gr.rewmgr', [
            'ivsp' => $ivsp,
        ]);
    }

    public function ivspSOPApproveManager($id)
    {
        $ivsp = Ivsp::findIVSPById($id);
        return view('sop_gr.rewmgr', [
            'ivsp' => $ivsp,
        ]);
    }

    public function ivspReviewByManager(Request $request, $id)
    {
        $update['process'] = 'Review By Manager';
        $update['number_of_process'] = 5;
        Ivsp::updateIVSPById($update, $id);
        redirect(route('dashboardmanager.index'))->with('success','IVSP has been reviewed by Manager successfully');
    }

    public function ivspApproveByManager(Request $request, $id)
    {
        $update['process'] = 'Approve By Manager';
        $update['number_of_process'] = 6;
        $update['end_date'] = Carbon::now();
        Ivsp::updateIVSPById($update, $id);
        redirect(route('dashboardmanager.index'))->with('success','IVSP has been approved by Manager successfully');
    }
}
