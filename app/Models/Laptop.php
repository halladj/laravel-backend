<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    use HasFactory;
    protected $guarded = ["updated_at", "created_at"];
    protected $hidden= ["updated_at", "created_at", "favorite"];

    public function qrCode()
    {
        return $this->hasOne(QrCode::class);
    }

    public function favorite()
    {
      return $this->belongsToMany(User::class, "favorite")
                  ->as('favorite')
                  ->withTimestamps();
    }

    public function history()
    {
      return $this->belongsToMany(User::class, "history")
                  ->as('history')
                  ->withTimestamps();
    }
}
