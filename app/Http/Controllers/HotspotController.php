<?php

namespace App\Http\Controllers;

use App\Models\Formulario;
use App\Models\Hotspot;
use Illuminate\Http\Request;

class HotspotController extends Controller
{
    //
    public function handleRequest(Request $request){
        $macAddress = $request->input('macAddress')?? null;
        $nombre = $reuest->input('nombre')?? null;
        /* buscar nombre del hotspot */
        $hotspot = Hotspot::where('nombre', $nombre)->first();

        if (!$hotspot) {
        return abort(404, 'Hotspot not found');
        }
        if(Formulario::where('mac_address', $macAddress)->exists()){

         return view('hotspot.requests.index',compact('hotspot'));
        }

        return view('hotspot.requests.formulario',compact('request'));

    }
}
