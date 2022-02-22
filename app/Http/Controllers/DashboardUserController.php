<?php

namespace App\Http\Controllers;

use App\Models\Gr;
use App\Models\Drf;
use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->post('id');
        $drf = Drf::searchDRFById($id);
        $gr = Gr::searchGRById($id);

        return view('', [
            'drf' => $drf,
            'gr' => $gr
        ]);
    }


}
