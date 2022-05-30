<?php

namespace App\Http\Controllers;

use App\Models\Drf;
use App\Models\Ivsp;
use Illuminate\Http\Request;

class DashboardGLController extends Controller
{
    public function index()
    {
        $drf = Drf::findDRFGL();
        $ivsp = Ivsp::findIVSPGL();
        $ivspReviewGL = Ivsp::findIVSPReviewGL();
        return view('dashboard', [
            'drf' => $drf,
            'ivsp' => $ivsp,
        ]);
    }

    public function history()
    {
        return view('history.history');
    }

    // public function showDRF($id)
    // {
    //     $drfGL = Drf::findDRFById($id);
    //     return view('', [
    //         'drf' => $drfGL,
    //     ]);
    // }

    // public function showIVSP($id)
    // {
    //     $ivspGL = Ivsp::findIVSPById($id);
    //     return view('', [
    //         'ivsp' => $ivspGL,
    //     ]);
    // }

    public function drfSOPGL($id)
    {
        $drf = Drf::findDRFById($id);
        return view('sop_drf.ackgl',[
            'drf' => $drf
        ]);
    }

    public function ivspSOPGL($id)
    {
        $ivsp = Ivsp::findIVSPById($id);
        return view('sop_gr.ackgl',[
            'ivsp' => $ivsp
        ]);
    }

    public function drfAckGL(Request $request, $id)
    {
        $update['process'] = 'ACK By GL';
        $update['number_of_process'] = 2;
        Drf::updateDRFById($update, $id);
        redirect(route('dashboardadmin.showDRF'))->with('success','DRF has been acknowledged successfully');
    }

    public function drfReviewGL(Request $request, $id)
    {
        $update['process'] = 'REVIEW By GL';
        $update['number_of_process'] = 5;
        Drf::updateDRFById($update, $id);
        redirect(route('dashboardadmin.showDRF'))->with('success','DRF has been reviewed by GL successfully');
    }

    public function ivspAckGL(Request $request, $id)
    {
        $update['process'] = 'ACK By GL';
        $update['number_of_process'] = 2;
        Ivsp::updateIVSPById($update, $id);
        redirect(route('dashboardadmin.showIVSP'))->with('success','IVSP has been acknowledged successfully');
    }

    public function ivspReviewGL(Request $request, $id)
    {
        $update['process'] = 'REVIEW By GL';
        $update['number_of_process'] = 4;
        Ivsp::updateIVSPById($update, $id);
        redirect(route('dashboardadmin.showIVSP'))->with('success','IVSP has been reviewed by GL successfully');
    }
}
