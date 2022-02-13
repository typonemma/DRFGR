<?php

namespace App\Http\Controllers;

use App\Http\Requests\PutDRFAndGR;
use App\Models\Gr;
use App\Models\Drf;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDRFAndGR;

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
        return view('');
    }

    public function history($month = 0, $year = 0)
    {
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
        return view('');
    }
    public function createGR()
    {
        return view('');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeDRF(StoreDRFAndGR $request)
    {
        $validatedData = $request->validated();
        $alpha = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = str_shuffle(($alpha),0,8);
        $validatedData['id'] = implode($randomString ,explode('-', $validatedData['date']));
        $validatedData['date_end'] = strtotime("+7 day", $validatedData['date']);
        Drf::create($validatedData);
        redirect(route('dashboardadmin.index'))->with('success','DRF has been added successfully');
    }
    public function storeGR(StoreDRFAndGR $request)
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
    public function updateDRF(PutDRFAndGR $request, $id)
    {
        $validatedData = $request->validated();
        Drf::updateDRFById($validatedData, $id);
        redirect(route('dashboardadmin.index'))->with('success','DRF has been updated successfully');
    }
    public function updateGR(PutDRFAndGR $request, $id)
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

