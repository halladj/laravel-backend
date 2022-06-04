<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return request()->user()->favorite;
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $user= $request->user();
      $laptop_request= $request["laptop"];
      $laptop= Laptop::create([
          "brand" => $laptop_request["brand"] ,
          //CPU Stuff
          "cpu_brand" => $laptop_request["cpu"]["brand"],
          "cpu_frequency" => $laptop_request["cpu"]["frequency"],
          "cpu_family" => $laptop_request["cpu"]["family"],
          "cpu_generation" => $laptop_request["cpu"]["generation"],
          "cpu_number_identifier" => $laptop_request["cpu"]["numberIdentifier"],
          "cpu_modifier" => $laptop_request["cpu"]["modifier"],
          //END CPU CUZ
          "state" => $laptop_request["state"],
          //GPU STUFF
          "gpu_brand" => $laptop_request["gpu"]["brand"],
          "gpu_words_identifier" => $laptop_request["gpu"]["wordsIdentifier"],
          "gpu_number_identifier" => $laptop_request["gpu"]["numberIdentifier"],
          "gpu_vram" => $laptop_request["gpu"]["vram"],
          "gpu_frequency" => $laptop_request["gpu"]["frequency"],
          //END GPU CUZZ
          "ram" => $laptop_request["ram"],
          "ram_frequency" => $laptop_request["ramFrequency"],
          "ram_type" => $laptop_request["ramType"],
          //END RAM
          "ssd" => $laptop_request["ssd"],
          "hdd" => $laptop_request["hdd"],
          "screen_refresh_rate" => $laptop_request["screenRefreshRate"],
          "screen_size" => $laptop_request["screenSize"],
          "screen_resolution" => $laptop_request["screenResolution"],
          "anti_glare" => $laptop_request["antiGlare"],
          "touch_screen" => $laptop_request["touchScreen"],
          "price" => $request["price"]

      ]);

      $user->favorite()->attach($laptop);
      return $laptop;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      return Laptop::where("id", $id)->firstOrFail();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= request()->user();
        $laptop= Laptop::where("id", $id)->firstOrFail();

        $user->favorite()->detach($laptop);
        return $user->favorite;
    }
}
