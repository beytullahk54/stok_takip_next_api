<?php

namespace App\Http\Controllers;

use App\Models\stoktakip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StokTakipController extends Controller
{

    public function get(Request $request)
    {
        return stoktakip::get();
    }
    public function store(Request $request){

        $stoktakip = new stoktakip();
        $stoktakip->urun_adi = $request->urun_adi;
        $stoktakip->urun_fiyati = $request->urun_fiyati;
        $stoktakip->urun_stok = $request->urun_stok;
        $stoktakip->user_id = Auth::User()->id;
        if($stoktakip->save())
        {
            return ["status"=>"success","message"=>"Başarılı"];
        }
    }
    public function update(Request $request){

        $stoktakip = stoktakip::where("id","=",$request->id)->first();
        $stoktakip->urun_adi = $request->urun_adi;
        $stoktakip->urun_fiyati = $request->urun_fiyati;
        $stoktakip->urun_stok = $request->urun_stok;
        $stoktakip->user_id = Auth::User()->id;
        if($stoktakip->save())
        {
            return ["status"=>"success","message"=>"Başarılı"];
        }
    }
    public function delete(Request $request){

        $stoktakip = stoktakip::where("id","=",$request->id)->first();
        if($stoktakip->delete())
        {
            return ["status"=>"success","message"=>"Başarılı"];
        }
    }
}
