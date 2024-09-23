<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sauna extends Model
{
    use HasFactory;

    public function saunaFacility()
    {
        return $this->belongsTo(SaunaFacility::class);
    }
}
