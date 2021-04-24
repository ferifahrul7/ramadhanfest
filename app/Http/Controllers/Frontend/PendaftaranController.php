<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PendaftaranRequest;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function create()
    {
        return view('frontend.pendaftaran');
    }

    public function store(PendaftaranRequest $request)
    {
        
        return response()->json(['status'=>'success','kode'=> '123']);
    }
}
