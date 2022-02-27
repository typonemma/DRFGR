<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDRF;
use App\Http\Requests\StoreGR;
use App\Models\Gr;
use App\Models\Drf;
use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    public function index(Request $request, $id = 0)
    {
        $drf = Drf::findDRFById($id);
        $gr = Gr::findGRById($id);

        return view('dashboarduser', [
            'drf' => $drf,
            'gr' => $gr
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
        $validatedData['id'] = "DRF-" . substr($validatedData['date'],-2) . "-" . $randomNumerics;
        $validatedData['date_end'] = strtotime("+7 day", $validatedData['date']);
        Drf::create($validatedData);
        redirect(route('dashboarduser.index'))->with('success','DRF has been added successfully');
    }
    public function storeGR(StoreGR $request)
    {
        $validatedData = $request->validated();
        $numeric = '1234567890';
        $randomNumerics = substr(str_shuffle($numeric), 0, 4);
        $validatedData['id'] = "IVSP-" . substr($validatedData['date'],-2) . "-" . $randomNumerics;
        $validatedData['date_end'] = strtotime("+5 day", $validatedData['date']);
        Gr::create($validatedData);
        redirect(route('dashboarduser.index'))->with('success','GR has been added successfully');
    }


}
