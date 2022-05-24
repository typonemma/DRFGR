<?php

namespace App\Http\Controllers;

use App\Models\Drf;
use App\Models\Ivsp;
use Illuminate\Http\Request;

class DashboardEngineerController extends Controller
{
    public function index()
    {
        $drf = Drf::findDRFEngineer();
        $ivsp = Ivsp::findIVSPEngineer();
        return view('dashboard', [
            'drf' => $drf,
            'ivsp' => $ivsp,
        ]);
    }

    public function showDRF($id)
    {
        $drf = Drf::findDRFById($id);
        return view('', [
            'drf' => $drf,
        ]);
    }

    public function showIVSP($id)
    {
        $ivsp = Ivsp::findIVSPById($id);
        return view('', [
            'ivsp' => $ivsp,
        ]);
    }

    public function drfDoByEngineer(Request $request, $id)
    {
        $update['process'] = 'Do By Engineer';
        $update['number_of_process'] = 3;
        Drf::updateDRFById($update, $id);
        redirect(route('dashboardadmin.showDRF'))->with('success','DRF has been done by Engineer successfully');
    }

    public function ivspDoByEngineer(Request $request, $id)
    {
        $update['process'] = 'Do By Engineer';
        $update['number_of_process'] = 3;
        Ivsp::updateIVSPById($update, $id);
        redirect(route('dashboardadmin.showIVSP'))->with('success','IVSP has been done by Engineer successfully');
    }

    public function drfReviewByEngineer(Request $request, $id)
    {
        $update['process'] = 'Review By Engineer';
        $update['number_of_process'] = 4;
        Drf::updateDRFById($update, $id);
        redirect(route('dashboardadmin.showDRF'))->with('success','DRF has been reviewed by Engineer successfully');
    }

    public function ivspReviewByEngineer(Request $request, $id)
    {
        $update['process'] = 'Review By Engineer';
        $update['number_of_process'] = 4;
        Ivsp::updateIVSPById($update, $id);
        redirect(route('dashboardadmin.showIVSP'))->with('success','IVSP has been reviewed by Engineer successfully');
    }

}
