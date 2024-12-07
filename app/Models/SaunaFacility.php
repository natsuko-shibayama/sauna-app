<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaunaFacility extends Model
{
    use HasFactory;

    public function saunas()
    {
        return $this->hasMany(Sauna::class);
    }

    /**中間テーブルに関しての記述 */
    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }
}
