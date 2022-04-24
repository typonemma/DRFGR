<?php

namespace App\Http\Controllers;

use App\Models\Drf;
use App\Models\Ivsp;
use Illuminate\Http\Request;

class DashboardManagerController extends Controller
{
    public function index()
    {
        $drf = Drf::findDRFManager();
        $ivsp = Ivsp::findIVSPManager();
        return view('dashboard', [
            'drf' => $drf,
            'ivsp' => $ivsp,
        ]);
    }

    public function showDRF($id)
    {
        $drf = Drf::findDRFById($id);
        return view('', [
            'drf' => $drf,
        ]);
    }

    public function showIVSP($id)
    {
        $ivsp = Ivsp::findIVSPById($id);
        return view('', [
            'ivsp' => $ivsp,
        ]);
    }

    public function drfReviewByManager(Request $request, $id)
    {
        $update['process'] = 'Review By Manager';
        $update['number_of_process'] = 5;
        Drf::updateDRFById($update, $id);
        redirect(route('dashboardadmin.showDRF'))->with('success','DRF has been reviewed by Manager successfully');
    }

    public function ivspReviewByManager(Request $request, $id)
    {
        $update['process'] = 'Review By Manager';
        $update['number_of_process'] = 5;
        Ivsp::updateIVSPById($update, $id);
        redirect(route('dashboardadmin.showIVSP'))->with('success','IVSP has been reviewed by Manager successfully');
    }

    public function drfApproveByManager(Request $request, $id)
    {
        $update['process'] = 'Approve By Manager';
        $update['number_of_process'] = 6;
        Drf::updateDRFById($update, $id);
        redirect(route('dashboardadmin.showDRF'))->with('success','DRF has been approved by Manager successfully');
    }

    public function ivspApproveByManager(Request $request, $id)
    {
        $update['process'] = 'Approve By Manager';
        $update['number_of_process'] = 6;
        Ivsp::updateIVSPById($update, $id);
        redirect(route('dashboardadmin.showIVSP'))->with('success','IVSP has been approved by Manager successfully');
    }
}
