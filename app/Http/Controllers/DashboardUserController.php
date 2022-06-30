<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Drf;
use App\Models\Ivsp;
use Illuminate\Http\Request;
use App\Models\IvspNomorModel;
use App\Http\Requests\StoreDRF;
use App\Http\Requests\StoreIVSP;
use App\Models\User;

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
        return view('dashboard.dashboarduser', [
            'drf' => $drf,
            'ivsp' => $ivsp,
        ]);
    }
    public function createDRF()
    {
        $gl = User::allGL();
        return view('form.formdrf', [
            'gl' => $gl,
        ]);
    }
    public function createIVSP()
    {
        return view('form.formivsp');
    }
    public function storeDRF(StoreDRF $request)
    {
        $validatedData = $request->validated();
        $lastDRF = DRF::checkDRFid();
        if($lastDRF){
            $number = (int)substr($lastDRF, -3);
            $number++;
            $validatedData['id'] = "DRF-" . substr($validatedData['di_date'],2,2) . "-" . str_pad($number,3,"0",STR_PAD_LEFT);
            $id = $validatedData['id'];
        }else {
            $validatedData['id'] = "DRF-" . substr($validatedData['di_date'],2,2) . "-001";
            $id = $validatedData['id'];
        }
        $validatedData['dokumen_pendukung'] = $request->file('dokumen_pendukung')->storeAs('drf', $id . '.pdf');
        Drf::create($validatedData);
        return redirect()->intended(route('dashboarduser.formDRF'))->with('success','DRF has been added successfully. Your id is ' . $id);
    }
    public function storeIVSP(StoreIVSP $request)
    {
        $validatedData = $request->validated();
        $lastIVSP = Ivsp::checkIVSPid();
        if($lastIVSP){
            $number = (int)substr($lastIVSP, -4);
            $number++;
            $validatedData['id'] = "IVSP-" . substr($validatedData['in_date'],2,2) . "-" . str_pad($number,4,"0",STR_PAD_LEFT);
            $id = $validatedData['id'];
        }else {
            $validatedData['id'] = "IVSP-" . substr($validatedData['in_date'],2,2) . "-0001";
            $id = $validatedData['id'];
        }
        Ivsp::create($validatedData);
        for ($i = 0; $i < count($validatedData['instrument_model']); $i++)
        {
            $ivspNomorModelData[$i]['ivsp_id'] = $id;
            $ivspNomorModelData[$i]['instrument_model'] = $validatedData['instrument_model'][$i];
            $ivspNomorModelData[$i]['serial_number'] = $validatedData['serial_number'][$i];
            $ivspNomorModelData[$i]['fault_report'] = $validatedData['fault_report'][$i];
            $ivspNomorModelData[$i]['desc'] = $validatedData['desc'][$i];
            $ivspNomorModelData[$i]['created_at'] = Carbon::now();
            $ivspNomorModelData[$i]['updated_at'] = Carbon::now();
        }
        IvspNomorModel::insert($ivspNomorModelData);
        return redirect()->intended(route('dashboarduser.formIVSP'))->with('success','IVSP has been added successfully. Your id is ' . $id);
    }


}
