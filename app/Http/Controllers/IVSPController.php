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
    public function show($id)
    {
        $ivsp = Ivsp::findIVSPById($id);
        return view('history.viewdatahistorygr', [
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

    public function history(Request $request)
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
            $ivsp = Ivsp::allIVSPOrderByNumberOfProcesses();
            return view('history.ivsphistory', [
                'ivsp' => '',
                'datepicker' => '',
            ]);
        }
    }

    
}
