<?php

namespace App\Http\Controllers;

use App\Models\QrCode;
use App\Models\Laptop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class QrCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $laptop_request = $request["laptop"];
        $laptop = Laptop::create([
            "brand" => $laptop_request["brand"],
            //CPU Stuff
            "cpu_brand" => $laptop_request["cpu"]["brand"],
            "cpu_frequency" => $laptop_request["cpu"]["frequency"],
            "cpu_family" => $laptop_request["cpu"]["family"],
            "cpu_generation" => $laptop_request["cpu"]["generation"],
            "cpu_number_identifier" =>
                $laptop_request["cpu"]["numberIdentifier"],
            "cpu_modifier" => $laptop_request["cpu"]["modifier"],
            //END CPU CUZ
            "state" => $laptop_request["state"],
            //GPU STUFF
            "gpu_brand" => $laptop_request["gpu"]["brand"],
            "gpu_words_identifier" => $laptop_request["gpu"]["wordsIdentifier"],
            "gpu_number_identifier" =>
                $laptop_request["gpu"]["numberIdentifier"],
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
            "price" => $request["price"],
        ]);

        $qr = $laptop->qrCode()->create([
            "hash_string" => "qrcode-generated-for-" . $laptop->id,
        ]);

        return Response()->json([
            "hash" => $qr->hash_string,
            "price" => $laptop->price,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QrCode  $qrCode
     * @return \Illuminate\Http\Response
     */
    public function show(string $hash)
    {
        $qr= QrCode::where("hash_string", $hash)->first();
        return $qr->laptop->price;
        //TODO ADD PRICE TO MODEL
        //AND ALSO ADD IT TO THE FLUTTER REQUEST
        //THAT GENERATE THE QR CODE
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QrCode  $qrCode
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $hash)
    {
        //
    }
}
