<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Drf;
use App\Models\Ivsp;
use Illuminate\Http\Request;

class DashboardGLController extends Controller
{
    public function index()
    {
        $drfProgress = Drf::findDRFAckGL();
        $ivspProgress = Ivsp::findIVSPAckGL();
        $drfReview = Drf::findDRFReviewGL();
        $ivspReview = Ivsp::findIVSPReviewGL();
        return view('dashboard.dashboardgl', [
            'drfProgress' => $drfProgress,
            'ivspProgress' => $ivspProgress,
            'drfReview' => $drfReview,
            'ivspReview' => $ivspReview,
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

    public function drfSOPAckGL($id)
    {
        $drf = Drf::findDRFById($id);
        return view('sop_drf.ackgl',[
            'drf' => $drf
        ]);
    }

    public function drfSOPReviewGL($id)
    {
        $drf = Drf::findDRFById($id);
        return view('sop_drf.rewgl',[
            'drf' => $drf
        ]);
    }

    public function ivspSOPAckGL($id)
    {
        $ivsp = Ivsp::findIVSPById($id);
        return view('sop_gr.ackgl',[
            'ivsp' => $ivsp
        ]);
    }

    public function ivspSOPReviewGL($id)
    {
        $ivsp = Ivsp::findIVSPById($id);
        return view('sop_gr.rewgl',[
            'ivsp' => $ivsp
        ]);
    }

    public function drfAckGL(Request $request, $id)
    {
        $update['process'] = 'ACK By GL';
        $update['number_of_process'] = 2;
        Drf::updateDRFById($update, $id);
        return redirect(route('dashboardgl.index'))->with('success','DRF has been acknowledged successfully');
    }

    public function drfReviewGL(Request $request, $id)
    {
        $update['process'] = 'REVIEW By GL';
        $update['number_of_process'] = 5;
        $update['end_date'] = Carbon::now();
        Drf::updateDRFById($update, $id);
        return redirect(route('dashboardgl.index'))->with('success','DRF has been reviewed by GL successfully');
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

    public function historyGL(Request $request)
    {
        $monthAndYear = $request->query->get('datepicker');
        if($monthAndYear){
            $month = intval(substr($monthAndYear, 5, 2));
            $year = intval(substr($monthAndYear, 0, 4));
            $drf = Drf::findDRFByMonthAndYear($month, $year);
            return view('history.gl.gldrfhistory', [
                'drf' => $drf,
                'datepicker' => $monthAndYear,
            ]);
        }else{
            $drf = [];
            return view('history.gl.gldrfhistory', [
                'drf' => $drf,
                'datepicker' => '',
            ]);
        }
    }
}
