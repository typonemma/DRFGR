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
        return view('dashboardadmin');
    }

    public function history(Request $request)
    {
        $month = $request->query->get('month'); // get month from query string
        $year = $request->query->get('year'); // get year from query string
        $drf = Drf::findDRFByMonth($month, $year);
        $gr = Ivsp::findIVSPByMonth($month, $year);
        return view('', [
            'drf' => $drf,
            'gr' => $gr,
        ]);
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
    public function createGR()
    {
        return view('formgr');
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
    public function storeGR(StoreIVSP $request)
    {
        $validatedData = $request->validated();
        $numeric = '1234567890';
        $randomNumerics = substr(str_shuffle($numeric), 0, 4);
        $validatedData['in_date'] = Carbon::now()->format('Y-m-d');
        $validatedData['id'] = "IVSP-" . substr($validatedData['in_date'],2,2) . "-" . $randomNumerics;
        $id = $validatedData['id'];
        Ivsp::create($validatedData);
        return redirect()->intended(route('dashboarduser.formGR'))->with('success','GR has been added successfully Your id is ' . $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showDRF($id)
    {
        $drf = Drf::findDRFById($id);
        return view('',[
            'drf' => $drf
        ]);
    }
    public function showGR($id)
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
    public function editGR($id)
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
        $validatedData = $request->validated();
        Drf::updateDRFById($validatedData, $id);
        redirect(route('dashboardadmin.index'))->with('success','DRF has been updated successfully');
    }
    public function updateGR(PutIVSP $request, $id)
    {
        $validatedData = $request->validated();
        Ivsp::updateIVSPById($validatedData, $id);
        redirect(route('dashboardadmin.index'))->with('success','GR has been updated successfully');
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
    public function destroyGR(Request $request, $id)
    {
        $rules = [ 'status' => 'required|alpha'];
        $validatedData = $request->validate($rules);
        Ivsp::updateIVSPById($validatedData, $id);
        redirect(route('drf.index'))->with('success','GR has been updated successfully');
    }
}
