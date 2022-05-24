<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Drf;
use App\Models\Ivsp;
use Illuminate\Http\Request;
use App\Http\Requests\PutDRF;
use App\Http\Requests\PutIVSP;
use App\Http\Requests\StoreDRF;
use App\Http\Requests\StoreIVSP;

class DashboardAdminController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Home Controller
    public function index()
    {
        $drfMonth = Drf::findDRFThisMonth();
        $drfWeek = Drf::findDRFThisWeek();
        $ivspMonth = Ivsp::findIVSPThisMonth();
        $ivspWeek = Ivsp::findIVSPThisWeek();
        $drfAdmin = Drf::findDRFAdmin();
        $ivspAdmin = Ivsp::findIVSPAdmin();
        return view('dashboard',[
            'drfMonth' => $drfMonth,
            'drfWeek' => $drfWeek,
            'ivspMonth' => $ivspMonth,
            'ivspWeek' => $ivspWeek,
            'drf' => $drfAdmin,
            'ivsp' => $ivspAdmin,
        ]);
    }

    public function history()
    {
        return view('history');
    }

    public function historyDRF(Request $request)
    {
        $monthAndYear = $request->query->get('datepicker');
        if($monthAndYear){
            $month = intval(substr($monthAndYear, 5, 2));
            $year = intval(substr($monthAndYear, 0, 4));
            $drf = Drf::findDRFByMonthAndYear($month, $year);
            return view('drfhistory', [
                'drf' => $drf,
                'datepicker' => $monthAndYear,
            ]);
        }else{
            return view('drfhistory', [
                'drf' => [],
                'datepicker' => '',
            ]);
        }
    }

    function historyIVSP(Request $request)
    {
        $monthAndYear = $request->query->get('datepicker');
        if($monthAndYear){
            $month = intval(substr($monthAndYear, 5, 2));
            $year = intval(substr($monthAndYear, 0, 4));
            $ivsp = Ivsp::findIvspByMonthAndYear($month, $year);
            return view('historyivsp', [
                'ivsp' => $ivsp,
            ]);
        }else{
            return view('ivsphistory');
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Form Controller

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Show Controller
    public function showDRF($id)
    {
        $drf = Drf::findDRFById($id);
        return view('sop_drf.ackadmn',[
            'drf' => $drf
        ]);
    }
    public function showIVSP($id)
    {
        $ivsp = Ivsp::findIVSPById($id);
        return view('sop_gr.ackadm', [
            'ivsp' => $ivsp
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // GA KEPAKE
    public function editDRF($id)
    {
        $drf = Drf::findDRFById($id);
        return view('adddrf',[
            'drf' => $drf
        ]);
    }
    public function editIVSP($id)
    {
        $ivsp = Ivsp::findIVSPById($id);
        return view('', [
            'ivsp' => $ivsp
        ]);
    }
    // GAK KEPAKE
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateDRF(Request $request, $id)
    {
        $update['process'] = 'ACK By Admin';
        $update['number_of_process'] = 1;
        Drf::updateDRFById($update, $id);
        return redirect()->intended(route('dashboardadmin.index'))->with('success','DRF has been acknowledged successfully');
    }
    public function updateIVSP(Request $request, $id)
    {
        $update['process'] = 'ACK By Admin';
        $update['number_of_process'] = 1;
        Ivsp::updateIVSPById($update, $id);
        return redirect()->intended(route('dashboardadmin.index'))->with('success','IVSP has been acknowledged successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyDRF(Request $request, $id)
    {
        $rules = [ 'status' => 'required|alpha'];
        $validatedData = $request->validate($rules);
        Drf::updateDRFById($validatedData, $id);
        redirect(route('drf.index'))->with('success','DRF has been updated successfully');
    }
    public function destroyIVSP(Request $request, $id)
    {
        $rules = [ 'status' => 'required|alpha'];
        $validatedData = $request->validate($rules);
        Ivsp::updateIVSPById($validatedData, $id);
        redirect(route('ivsp.index'))->with('success','IVSP has been updated successfully');
    }
}
