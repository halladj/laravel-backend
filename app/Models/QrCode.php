<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrCode extends Model
{
    use HasFactory;


    protected $fillable= ["laptop_id", "hash_string"];
    protected $hidden= ["updated_at", "created_at"];

    public function laptop()
    {
        return $this->belongsTo(Laptop::class);
    }
}
