<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewFavorite extends Model
{
    // テストをする場合も、そうでないときもとりあえず書いといたらいい
    use HasFactory;

    // コントローラーでモデルからカラムを一括登録する場合は必須。そうでないときはなくてもよい
    protected $fillable = ['user_id','review_id'];


    // ユーザとのリレーション
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 口コミとのリレーション
    public function review()
    {
        return $this->belongsTo(Review::class);
    }

}
