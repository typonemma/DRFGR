<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Drf;
use App\Models\Ivsp;
use Illuminate\Http\Request;

class DashboardEngineerController extends Controller
{
    public function index()
    {
        $drf = Drf::findDRFEngineer();
        $ivsp = Ivsp::findIVSPEngineer();
        return view('dashboard.dashboardengineer', [
            'drf' => $drf,
            'ivsp' => $ivsp,
        ]);
    }

    // public function showDRF($id)
    // {
    //     $drf = Drf::findDRFById($id);
    //     return view('', [
    //         'drf' => $drf,
    //     ]);
    // }

    // public function showIVSP($id)
    // {
    //     $ivsp = Ivsp::findIVSPById($id);
    //     return view('', [
    //         'ivsp' => $ivsp,
    //     ]);
    // }

    public function drfSOPEngineer($id)
    {
        $drf = Drf::findDRFById($id);
        return view('sop_drf.doeng',[
            'drf' => $drf
        ]);
    }

    public function ivspSOPEngineer($id)
    {
        $ivsp = Ivsp::findIVSPById($id);
        return view('sop_gr.doeng',[
            'ivsp' => $ivsp
        ]);
    }

    public function drfDoByEngineer(Request $request, $id)
    {
        $update['process'] = 'Do By Engineer';
        $update['number_of_process'] = 3;
        $update['start_date'] = Carbon::now();
        Drf::updateDRFById($update, $id);
        redirect(route('dashboardengineer.index'))->with('success','DRF has been done by Engineer successfully');
    }

    public function ivspDoByEngineer(Request $request, $id)
    {
        $update['process'] = 'Do By Engineer';
        $update['number_of_process'] = 3;
        Ivsp::updateIVSPById($update, $id);
        redirect(route('dashboardengineer.index'))->with('success','IVSP has been done by Engineer successfully');
    }
}
