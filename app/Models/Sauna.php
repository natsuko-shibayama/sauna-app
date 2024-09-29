<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sauna extends Model
{
    use HasFactory;

    // サウナの種類を定義
    const TYPE_DRY = 1;
    const TYPE_STEAM = 2;
    const TYPE_MIST = 3;
    const TYPE_LOULY = 4;

    public static $typeNames = [
        self::TYPE_DRY => '乾式サウナ（ドライサウナ）',
        self::TYPE_STEAM => '湿式サウナ（スチームサウナ）',
        self::TYPE_MIST => '湿式サウナ（ミストサウナ）',
        self::TYPE_LOULY => 'ロウリュサウナ',
    ];

    // アクセサを定義
    public function getTypeNameAttribute()
    {
        return self::$typeNames[$this->type] ?? '不明なタイプ';
    }

    public function saunaFacility()
    {
        return $this->belongsTo(SaunaFacility::class);
    }
}
