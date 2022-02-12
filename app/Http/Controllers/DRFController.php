<?php

namespace App\Http\Controllers;

use App\Http\Requests\PutDRFAndGR;
use App\Models\Drf;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDRFAndGR;

class DRFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drf = Drf::allDRF();
        return view('',[
            'drf' => $drf,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('',[]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDRFAndGR $request)
    {
        $validatedData = $request->validated();
        $alpha = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = str_shuffle(($alpha),0,8);
        $validatedData['id'] = implode($randomString ,explode('-', $validatedData['date']));
        Drf::create($validatedData);
        redirect(route('drf.index'))->with('success','DRF has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $drf = Drf::searchDRFById($id);
        return view('drf.show', [
            'drf' => $drf
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
        $drf = Drf::searchDRFById($id);
        return view('',[
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
    public function update(PutDRFAndGR $request, $id)
    {
        $validatedData = $request->validated();
        Drf::updateDRFById($validatedData, $id);
        redirect(route('drf.index'))->with('success','DRF has been updated successfully');
    }

    public function updateStatus(Request $request, $id)
    {
        $rules = [ 'status' => 'required|alpha'];
        $validatedData = $request->validate($rules);
        Drf::updateDRFById($validatedData, $id);
        redirect(route('drf.index'))->with('success','DRF has been acknowledge');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $rules = [ 'status' => 'required|alpha'];
        $validatedData = $request->validate($rules);
        Drf::updateDRFById($validatedData, $id);
        redirect(route('drf.index'))->with('success','DRF has been rejected');
    }
}
