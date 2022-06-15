<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Parkir;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;


class ParkirController extends Controller
{
    public function getArea()
    {
        $areas = Area::where('status', '1')->get();
        return response()->json([
            'action'=> "Get parkir area",
            'data'=> $areas
        ]);
    }
    
    public function parkirIn($nomer_polisi) {
        $ceknomerpolisi = Parkir::where('nomer_polisi', $nomer_polisi)
            ->whereNull('waktu_keluar')
            ->first();
        // dd($ceknomerpolisi);
        if($ceknomerpolisi) {
            return response()->json([
                'action'=> "Parkir in",
                'data'=> "Nomer polisi sudah parkir"
            ]);

        }
        $getArea = Area::where('status', '1')->first();
        if($getArea) {
        
        $createParking = Parkir::create([
            'nomer_polisi' => $nomer_polisi,
            'waktu_masuk' => Carbon::now(),
            'waktu_keluar' => null,
            'area_id' => $getArea->id
        ]);
        if($createParking) {
            $getArea->update([
                'status' => '0'
            ]);
               $data ="Success parkir in";
        }
    }else{
        $data ="parkir area not found";
    }
        return response()->json([
            'action'=> "Parkir in",
            'data'=> $data
        ]);
    }
   
    public function parkirout($nomer_polisi)
    {
        $ceknomerpolisi = Parkir::where('nomer_polisi', $nomer_polisi)
            ->whereNull('waktu_keluar')
            ->first();
            if(!$ceknomerpolisi) {
                return response()->json([
                    'action'=> "Parkir out",
                    'data'=> "Nomer polisi belum parkir"
                ]);
    
            }
    $updatParkir = $ceknomerpolisi->update([
        'waktu_keluar' => Carbon::now()
    ]);
    if($updatParkir) {
        Area::find($ceknomerpolisi->area_id)->update([
            'status' => '1'
        ]);

        $data ="Success parkir out";
        }
      return response()->json([
        'action'=> "Parkir out",
        'data'=> $data
    ]);
    }
   
}