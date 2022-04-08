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
        return view('dashboardadmin',[
            'drfMonth' => $drfMonth,
            'drfWeek' => $drfWeek,
            'ivspMonth' => $ivspMonth,
            'ivspWeek' => $ivspWeek,
        ]);
    }

    public function history()
    {
        return view('history');
    }

    public function historyDRF(Request $request)
    {
        $month = $request->query->get('month');
        $year = $request->query->get('year');
        if($month && $year){
        $drf = Drf::findDRFByMonthAndYear($month, $year);
        return view('historydrf', [
            'drf' => $drf,
        ]);
        }else{
            return view('historydrf');
        }
    }

    function historyIVSP(Request $request)
    {
        $month = $request->query->get('month');
        $year = $request->query->get('year');
        if($month && $year){
        $ivsp = Ivsp::findIvspByMonthAndYear($month, $year);
        return view('historyivsp', [
            'ivsp' => $ivsp,
        ]);
        }else{
            return view('historydrf');
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Form Controller
    public function createDRF()
    {
        return view('formdrf');
    }
    public function createIVSP()
    {
        return view('formivsp');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeDRF(StoreDRF $request)
    {
        $validatedData = $request->validated();
        $numeric = '1234567890';
        $validatedData['di_date'] = Carbon::now()->format('Y-m-d');
        $randomNumerics = substr(str_shuffle($numeric), 0, 3);
        $validatedData['id'] = "DRF-" . substr($validatedData['di_date'],2,2) . "-" . $randomNumerics;
        $validatedData['date_end'] = strtotime("+7 day", $validatedData['date']);
        Drf::create($validatedData);
        return redirect()->intended(route('dashboarduser.formDRF'))->with('success','DRF has been added successfully');
    }
    public function storeIVSP(StoreIVSP $request)
    {
        $validatedData = $request->validated();
        $numeric = '1234567890';
        $randomNumerics = substr(str_shuffle($numeric), 0, 4);
        $validatedData['in_date'] = Carbon::now()->format('Y-m-d');
        $validatedData['id'] = "IVSP-" . substr($validatedData['in_date'],2,2) . "-" . $randomNumerics;
        $id = $validatedData['id'];
        Ivsp::create($validatedData);
        return redirect()->intended(route('dashboarduser.formIVSP'))->with('success','IVSP has been added successfully Your id is ' . $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showDRF()
    {
        $drf = Drf::allDRF();
        return view('',[
            'drf' => $drf
        ]);
    }
    public function showIVSP($id)
    {
        $ivsp = Ivsp::findIVSPById($id);
        return view('', [
            'ivsp' => $ivsp
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editDRF($id)
    {
        $drf = Drf::findDRFById($id);
        return view('',[
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
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateDRF(PutDRF $request, $id)
    {
        $update['process'] = 'ACK By Admin';
        $drf = Drf::findDRFById($id);
        $update['number_of_process'] = $drf['number_of_process'] + 1;
        Drf::updateDRFById($update, $id);
        redirect(route('dashboardadmin.showDRF'))->with('success','DRF has been updated successfully');
    }
    public function updateIVSP(PutIVSP $request, $id)
    {
        $validatedData = $request->validated();
        Ivsp::updateIVSPById($validatedData, $id);
        redirect(route('dashboardadmin.showIVSP'))->with('success','IVSP has been updated successfully');
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
