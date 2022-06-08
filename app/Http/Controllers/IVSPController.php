<?php

namespace App\Http\Controllers;

use App\Models\Ivsp;
use Illuminate\Http\Request;

class IVSPController extends Controller
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
    public function showSuperAdmin($id)
    {
        $ivsp = Ivsp::findIVSPById($id);
        return view('history.superadmin.superadminviewdatahistorygr', [
            'ivsp' => $ivsp,
        ]);
    }

    public function showAdmin($id)
    {
        $ivsp = Ivsp::findIVSPById($id);
        return view('history.admin.viewdatahistorygr', [
            'ivsp' => $ivsp,
        ]);
    }
    
    public function showGL($id)
    {
        $ivsp = Ivsp::findIVSPById($id);
        return view('history.gl.glviewdatahistorygr', [
            'ivsp' => $ivsp,
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ivsp::deleteIVSPById($id);
        return redirect()->route('dashboardadmin.showIVSP', $id)->with('success', 'IVSP has been deleted');
    }

    public function historySuperAdmin(Request $request)
    {
        $monthAndYear = $request->query->get('datepicker');
        if($monthAndYear){
            $month = intval(substr($monthAndYear, 5, 2));
            $year = intval(substr($monthAndYear, 0, 4));
            $ivsp = Ivsp::findIvspByMonthAndYear($month, $year);
            return view('history.ivsphistory', [
                'ivsp' => $ivsp,
                'datepicker' => $monthAndYear,
            ]);
        }else{
            $ivsp = [];
            return view('history.ivsphistory', [
                'ivsp' => [],
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
            $ivsp = Ivsp::findIvspByMonthAndYear($month, $year);
            return view('history.ivsphistory', [
                'ivsp' => $ivsp,
                'datepicker' => $monthAndYear,
            ]);
        }else{
            $ivsp = [];
            return view('history.ivsphistory', [
                'ivsp' => [],
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
            $ivsp = Ivsp::findIvspByMonthAndYear($month, $year);
            return view('history.ivsphistory', [
                'ivsp' => $ivsp,
                'datepicker' => $monthAndYear,
            ]);
        }else{
            $ivsp = [];
            return view('history.ivsphistory', [
                'ivsp' => [],
                'datepicker' => '',
            ]);
        }
    }


}
