<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class Laptop extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
      return [
        "brand" => $this->brand,
        "cpu" => {
        "cpu" => $this->cpu_brand,
        },
      ];
    }
}

/*
 * {
	"brand": "msi",
	"cpu": {
		"name": "intel core i5-10350h",
		"brand": "intel", 
		"family": "u",
		"frequency": 2.4,
		"modifier": "i7",
		"numberIdentifier": 300,
		"generation": 8
	}, 
	"hdd": 0,
	"gpu": {
		"name": 0,
		"brand": 0,
		"frequency": 0,
		"numberIdentifier": 0,
		"wordsIdentifier": 0,
		"vram": 0
	},
	"ram": 4,
	"ramFrequency": 0.0,
	"ramType": "ddr4",
	"ssd": 512, 
	"screenRefreshRate": 144,
	"screenSize": 12.0,
	"screenResolution": "4k",
	"antiGlare": 0,
	"touchScreen": 0,
	"state": 1
}

 */

