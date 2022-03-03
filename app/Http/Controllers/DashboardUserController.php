<?php

namespace App\Http\Controllers;

use App\Models\Drf;
use App\Models\Ivsp;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDRF;
use App\Http\Requests\StoreIVSP;
use Carbon\Carbon;

class DashboardUserController extends Controller
{
    public function index(Request $request, $id = 0)
    {
        $drf = Drf::findDRFById($id);
        $ivsp = Ivsp::findIVSPById($id);

        return view('dashboarduser', [
            'drf' => $drf,
            'ivsp' => $ivsp
        ]);
    }
    public function createDRF()
    {
        return view('formdrf');
    }
    public function createGR()
    {
        return view('formivsp');
    }
    public function storeDRF(StoreDRF $request)
    {
        $validatedData = $request->validated();
        $numeric = '1234567890';
        $randomNumerics = substr(str_shuffle($numeric), 0, 3);
        $validatedData['id'] = "DRF-" . substr($validatedData['di_date'],2,2) . "-" . $randomNumerics;
        $id = $validatedData['id'];
        Drf::create($validatedData);
        return redirect()->intended(route('dashboarduser.formDRF'))->with('success','DRF has been added successfully. Your id is ' . $id);
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
        return redirect()->intended(route('dashboarduser.formGR'))->with('success','GR has been added successfully. Your id is ' . $id);
    }


}
