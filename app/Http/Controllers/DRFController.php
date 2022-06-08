<?php

namespace App\Http\Controllers;

use App\Models\Drf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DRFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $drf = Drf::findDRFById($id);
        return view('history.viewdatahistorydrf', [
            'drf' => $drf,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $drf = Drf::findDRFById($id);
        return view('adddrfadmin.adddrf',[
            'drf' => $drf
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'gl_initial' => 'required',
            'current_work_status' => 'required',
        ]);
        Drf::updateDRFById($validatedData, $id);
        return redirect()->route('dashboardadmin.showDRF', $id)->with('success', 'DRF has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Storage::delete('drf/'.$id . '.pdf');
        Drf::deleteDRFById($id);
        return redirect()->route('dashboardadmin.index')->with('success', 'DRF has been deleted');
    }
    //History DRF
    public function historySuperAdmin(Request $request)
    {
        $monthAndYear = $request->query->get('datepicker');
        if($monthAndYear){
            $month = intval(substr($monthAndYear, 5, 2));
            $year = intval(substr($monthAndYear, 0, 4));
            $drf = Drf::findDRFByMonthAndYear($month, $year);
            return view('history.superadmin.superadmindrfhistory', [
                'drf' => $drf,
                'datepicker' => $monthAndYear,
            ]);
        }else{
            $drf = [];
            return view('history.superadmin.superadmindrfhistory', [
                'drf' => $drf,
                'datepicker' => '',
            ]);
        }
    }

    public function historyAdmin(Request $request)
    {
        $monthAndYear = $request->query->get('datepicker');
        if($monthAndYear){
            $month = intval(substr($monthAndYear, 5, 2));
            $year = intval(substr($monthAndYear, 0, 4));
            $drf = Drf::findDRFByMonthAndYear($month, $year);
            return view('history.admin.drfhistory', [
                'drf' => $drf,
                'datepicker' => $monthAndYear,
            ]);
        }else{
            $drf = [];
            return view('history.admin.drfhistory', [
                'drf' => $drf,
                'datepicker' => '',
            ]);
        }
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
