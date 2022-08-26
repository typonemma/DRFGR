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
    public function index()
    {
        $drfMonth = Drf::findDRFThisMonth();
        $drfWeek = Drf::findDRFThisWeek();
        $ivspMonth = Ivsp::findIVSPThisMonth();
        $ivspWeek = Ivsp::findIVSPThisWeek();
        $drfAdmin = Drf::findDRFAdmin();
        $ivspAdmin = Ivsp::findIVSPAdmin();
        return view('dashboard.dashboard',[
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
        return view('history.admin.history');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function drfProcessAdmin($id)
    {
        $update['process'] = 'ACK By Admin';
        $update['number_of_process'] = 1;
        Drf::updateDRFById($update, $id);
        return redirect()->intended(route('dashboardadmin.index'))->with('success','DRF has been acknowledged successfully');
    }
    public function ivspProcessAdmin($id)
    {
        $update['process'] = 'ACK By Admin';
        $update['number_of_process'] = 1;
        $update['start_date'] = Carbon::now();
        Ivsp::updateIVSPById($update, $id);
        return redirect()->intended(route('dashboardadmin.index'))->with('success','IVSP has been acknowledged successfully');
    }

    public function drfSOPAdmin($id)
    {
        $drf = Drf::findDRFById($id);
        return view('sop_drf.ackadmn',[
            'drf' => $drf
        ]);
    }

    public function ivspSOPAdmin($id){
        $ivsp = Ivsp::findIVSPById($id);
        return view('sop_gr.ackadm', [
            'ivsp' => $ivsp
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

}
