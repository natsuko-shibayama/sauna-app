<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['review_id', 'content', 'user_id'];

    // 口コミとの関係性
    public function review()
    {
        return $this->belongsTo(Review::class);
    }

    // ユーザとの関係性
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
