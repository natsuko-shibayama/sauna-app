<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'sauna_facility_id',
        'visit_date',
        'rating',
        'review',
    ];

    // saunaFacilityテーブルとの関係性
    public function saunaFacility()
    {
        return $this->belongsTo(SaunaFacility::class);
    }

    // userテーブルとの関係性
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // ReviewFavoriteテーブルとの関係性
    public function reviewFavorites()
    {
        return $this->hasMany(ReviewFavorite::class);
    }

    // Commentテーブルとの関係性
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
