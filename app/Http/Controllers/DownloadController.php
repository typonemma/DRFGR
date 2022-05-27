<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function index(Request $request){
        $file = $request->post('dokumen_pendukung');
        return Storage::download($file);
    }
}
