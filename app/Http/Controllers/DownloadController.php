<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function index(Request $request){
        $path = $request->get('path');
        return Storage::download('drf/' . $path);
    }
}
