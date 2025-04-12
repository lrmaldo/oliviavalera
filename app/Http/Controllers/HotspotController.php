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
        $nombre = $request->nombre?? null;
        /* buscar nombre del hotspot */
        /* where like */
        $hotspot = Hotspot::where('nombre', 'like', '%' . $nombre . '%')->first();
        dd($request->all(), $hotspot);
        if (!$hotspot) {
        return abort(404, 'Hotspot not found');
        }
        if(Formulario::where('mac_address', $macAddress)->exists()){

         return view('hotspot.requests.index',compact('hotspot'));
        }

        return view('hotspot.requests.formulario',compact('request'));

    }
}
