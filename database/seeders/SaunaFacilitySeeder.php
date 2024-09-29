<?php

namespace Database\Seeders;

use App\Models\SaunaFacility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SaunaFacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sauna_facilities')->insert(
            [
                'name' => '朝霞サウナ 和(なごみ)',
                'postal_code' => '351-0011',
                'prefecture' => '埼玉県',
                'city' => '朝霞市',
                'address' => '本町3丁目1-53',
                'access' => '東武東上線 朝霞駅南口から徒歩1分',
                'location_map' => 'https://maps.app.goo.gl/68DFsRdN4jsXk1n37',
                'price' => '■ 朝ウナ(6:00〜9:59) 800円
■ 通常(10:00〜24:00) 60分: 1,200円 90分: 1,500円 120分: 1,800円
■平日限定フリー(3時間以上): 2,400円',
                'image_path' => 'images/n7kAuMh8RcuxUnpJAyNLs5qhNWJ4YpMqc6ARinFB.png',
                'sauna_comment' => '男性用アウフグースは水土の週２回、1時間に１回ずつあり。男女サウナが入れ替わることあり（SNSにて告知あり）',
                'has_loyly' => 1,
                'loyly_comment' => 'オートロウリュ,アウフグース',
                'has_water_bath' => 1,
                'water_bath_comment' => '男性：シングルの水風呂（9℃以下）、水風呂（14~15℃）
女性：水風呂（16~17℃）',
                'has_outdoor_bath' => 0,
                'has_chair' => 1,
                'chair_comment' => '・リクライニングチェア：7脚
・ロッキングチェア：2脚
・ガーデンチェア：5脚
・三人掛け横長ベンチ：1脚',
                'recommendation' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        DB::table('sauna_facilities')->insert(
            [
                'name' => '湯屋敷 孝楽',
                'postal_code' => '330-0073',
                'prefecture' => '埼玉県',
                'city' => 'さいたま市浦和区',
                'address' => '元町2-18-12',
                'access' => '北浦和駅東口より徒歩7分',
                'location_map' => 'https://maps.app.goo.gl/BAbErWP7DCUnVxpB6',
                'price' => '■ 入浴
平日：650円
土日祝：750円
タオルセット：200円
館内着：250円
タオル＋館内着：400円',
                'image_path' => 'images/hBZ7gALMbkFVRD2V5Tkb54V2Wz5Z53K812oeV1HX.png',
                'sauna_comment' => '男女共：ロウリュウサウナ（85~89℃）',
                'has_loyly' => 1,
                'loyly_comment' => '1時間に強弱2種類のオートロウリュウ実施！
【男性】毎時00分：マイルド／毎時30分：ストロング
【女性】毎時00分：ストロング／毎時30分：マイルド',
                'has_water_bath' => 1,
                'water_bath_comment' => '冷水風呂：10~13℃',
                'has_outdoor_bath' => 1,
                'has_chair' => 1,
                'chair_comment' => '男性露天エリア：デッキチェア
女性露天エリア：リラックスチェア',
                'recommendation' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );
        DB::table('sauna_facilities')->insert(
            [
                'name' => 'おふろcafe utatane(ウタタネ)',
                'postal_code' => '331-0815',
                'prefecture' => '埼玉県',
                'city' => 'さいたま市北区',
                'address' => '大成町4丁目179',
                'access' => '電車：埼玉新都市交通「ニューシャトル」で
鉄道博物館駅（大成駅）より線路沿いを
北に向かって徒歩約10分
バス：東武バス「 宮原1丁目」より徒歩7分
　　　さいたまコミュニティバス「大成橋西」徒歩3分',
                'location_map' => 'https://maps.app.goo.gl/9LXyoqpRhEQdBjtSA',
                'price' => '大人　550円〜
小人　275円〜
※土日祝は平日＋100円
※朝風呂、フリータイム、時間制の他、
　宿泊まで多種多様のコースあり',
                'image_path' => 'images/bYmgvIASpuo7ZlfIKKQh7DqGjsP6yb7bJHtdN5L1.png',
                'sauna_comment' => '男女共：SAUNA COTA　84℃以下
　　　イズネスサウナ室　90~94℃',
                'has_loyly' => 1,
                'loyly_comment' => 'セルフロウリュ
アウフグース
オートロウリュ
（1時間置き、男湯…毎時00分、女湯…毎時30分）',
                'has_water_bath' => 1,
                'water_bath_comment' => '男女共：水風呂　18~19℃',
                'has_outdoor_bath' => 0,
                'has_chair' => 1,
                'chair_comment' => '情報なし',
                'recommendation' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );
        DB::table('sauna_facilities')->insert(
            [
                'name' => 'spa LaQua スパラクーア',
                'postal_code' => '112-0003',
                'prefecture' => '東京都',
                'city' => '文京区',
                'address' => '春日１丁目１−１',
                'access' => '丸の内線　後楽園駅から徒歩4分',
                'location_map' => 'https://maps.app.goo.gl/fRhbZi5oBoULfZaf6',
                'price' => '入館料：大人3230円　6~17才：2640円
※お得なパックプランや入館回数券などもあり
※別で「サウナラウンジ レントラ」もあり。要予約',
                'image_path' => 'images/fypZJ5vvUslJPxLwqDuS06ZNpD8yjuFoXu5ZLoJH.png',
                'sauna_comment' => '男性：高温サウナ（100℃以上）
　　　中高温サウナ（84℃以下）
　　　フィンランドサウナ（84℃以下）
女性：中高温サウナ（84℃以下）
　　　ミストサウナ（84℃以下）
　　　フィンランドサウナ（84℃以下）',
                'has_loyly' => 1,
                'loyly_comment' => 'ロウリュ
アウフグース',
                'has_water_bath' => 1,
                'water_bath_comment' => '男性：冷水（17℃、22℃）
女性：冷水（22℃）',
                'has_outdoor_bath' => 0,
                'has_chair' => 1,
                'chair_comment' => 'サウナラウンジ レントラには個室内にととのい椅子あり',
                'recommendation' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );
    }
}
