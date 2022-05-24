<?php

namespace App\Http\Controllers;

use App\Models\Drf;
use App\Models\Ivsp;
use Illuminate\Http\Request;

class DashboardGLController extends Controller
{
    public function index()
    {
        $drfGL = Drf::findDRFGL();
        $ivspGL = Ivsp::findIVSPGL();
        return view('dashboard', [
            'drf' => $drfGL,
            'ivsp' => $ivspGL,
        ]);
    }

    public function showDRF($id)
    {
        $drfGL = Drf::findDRFById($id);
        return view('', [
            'drf' => $drfGL,
        ]);
    }

    public function showIVSP($id)
    {
        $ivspGL = Ivsp::findIVSPById($id);
        return view('', [
            'ivsp' => $ivspGL,
        ]);
    }

    public function updateDRF(Request $request, $id)
    {
        $update['process'] = 'ACK By GL';
        $update['number_of_process'] = 2;
        Drf::updateDRFById($update, $id);
        redirect(route('dashboardadmin.showDRF'))->with('success','DRF has been acknowledged successfully');
    }
    public function updateIVSP(Request $request, $id)
    {
        $update['process'] = 'ACK By GL';
        $update['number_of_process'] = 2;
        Ivsp::updateIVSPById($update, $id);
        redirect(route('dashboardadmin.showIVSP'))->with('success','IVSP has been acknowledged successfully');
    }
}
