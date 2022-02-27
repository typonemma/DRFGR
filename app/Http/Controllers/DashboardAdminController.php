<?php

namespace App\Http\Controllers;

use App\Http\Requests\PutDRF;
use App\Models\Gr;
use App\Models\Drf;
use App\Http\Requests\PutGR;
use Illuminate\Http\Request;
use App\Http\Requests\StoreGR;
use App\Http\Requests\StoreDRF;

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
        $gr = Gr::findDRFByMonth($month, $year);
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
        $alpha = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = str_shuffle(($alpha),0,8);
        $validatedData['id'] = implode($randomString ,explode('-', $validatedData['date']));
        $validatedData['date_end'] = strtotime("+7 day", $validatedData['date']);
        Drf::create($validatedData);
        redirect(route('dashboardadmin.index'))->with('success','DRF has been added successfully');
    }
    public function storeGR(StoreGR $request)
    {
        $validatedData = $request->validated();
        $alpha = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = str_shuffle(($alpha),0,8);
        $validatedData['id'] = implode($randomString ,explode('-', $validatedData['date']));
        $validatedData['date_end'] = strtotime("+5 day", $validatedData['date']);
        Gr::create($validatedData);
        redirect(route('dashboardadmin.index'))->with('success','GR has been added successfully');
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
        $gr = Gr::findGRById($id);
        return view('', [
            'gr' => $gr
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
        $gr = Gr::findGRById($id);
        return view('', [
            'gr' => $gr
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
    public function updateGR(PutGR $request, $id)
    {
        $validatedData = $request->validated();
        Gr::updateGRById($validatedData, $id);
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
        Gr::updateGRById($validatedData, $id);
        redirect(route('drf.index'))->with('success','GR has been updated successfully');
    }
}
