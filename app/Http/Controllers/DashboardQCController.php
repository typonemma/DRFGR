<?php

namespace App\Http\Controllers;

use App\Models\Drf;
use App\Models\Ivsp;
use Illuminate\Http\Request;

class DashboardQCController extends Controller
{
    public function index()
    {
        $drf = Drf::findDRFQC();
        return view('dashboard.dashboard', [
            'drf' => $drf,
        ]);
    }

    public function history()
    {
        return view('history.history');
    }

    public function drfSOPQC($id)
    {
        $drf = Drf::findDRFById($id);
        return view('sop_drf.rewqc',[
            'drf' => $drf
        ]);
    }

    public function drfReviewQC($id)
    {
        $update['process'] = 'REVIEW By QC';
        $update['number_of_process'] = 4;
        Drf::updateDRFById($update, $id);
        redirect(route('dashboardqc.index'))->with('success','DRF has been reviewed by QC successfully');
    }
}
