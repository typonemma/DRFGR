<?php

namespace App\Http\Controllers;

use App\Models\Drf;
use App\Models\Ivsp;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDRF;
use App\Http\Requests\StoreIVSP;
use App\Models\IvspNomorModel;

class DashboardUserController extends Controller
{
    public function index(Request $request, $id = '')
    {
        $id = $request->query->get('search');
        $ivsp = Ivsp::findIVSPById($id);
        $drf = Drf::findDRFById($id);
        if($ivsp){
        $date = strtotime($ivsp['in_date'] . '. + 5 days ');
        $ivsp['estimate'] = date('Y-m-d',$date);
        }else if($drf){
        $date = strtotime($drf['di_date'] . '. + ' . $drf['di_duration'] . ' days ');
        $drf['estimate'] = date('Y-m-d',$date);
        }
        return view('dashboarduser', [
            'drf' => $drf,
            'ivsp' => $ivsp,
        ]);
    }
    public function createDRF()
    {
        return view('formdrf');
    }
    public function createGR()
    {
        return view('formgr');
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
        dd($validatedData);
        $numeric = '1234567890';
        $randomNumerics = substr(str_shuffle($numeric), 0, 4);
        $validatedData['id'] = "IVSP-" . substr($validatedData['in_date'],2,2) . "-" . $randomNumerics;
        $id = $validatedData['id'];
        Ivsp::create($validatedData);
        $ivspNomorModelData['ivsp_id'] = $id;
        $ivspNomorModelData['instrument_model'] = $validatedData['instrument_model'];
        $ivspNomorModelData['serial_number'] = $validatedData['serial_number'];
        $ivspNomorModelData['fault_report'] = $validatedData['fault_report'];
        IvspNomorModel::insert($ivspNomorModelData);
        return redirect()->intended(route('dashboarduser.formGR'))->with('success','GR has been added successfully. Your id is ' . $id);
    }


}
