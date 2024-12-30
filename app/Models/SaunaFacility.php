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

    /**お気に入りボタンとの関係性 */
    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }


    // 口コミとの関係性-お気に入りとちょっと違うのはなぜ？
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

}
