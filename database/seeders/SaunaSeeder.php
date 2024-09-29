<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SaunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('saunas')->insert(
            [
                'sauna_facility_id' => 1,
                'type' => 1,
                'temperature' => '100℃',
                'note' => '男性用のドライサウナ。\n6段雛壇サウナ\nアウフグースもあるため、100℃以上になることも。',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );
        DB::table('saunas')->insert(
            [
                'sauna_facility_id' => 1,
                'type' => 1,
                'temperature' => '95~99℃',
                'note' => '女性用のドライサウナ。\n2段雛壇サウナが向かい合って2つ。\nアウフグースはなし。',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );
        DB::table('saunas')->insert(
            [
                'sauna_facility_id' => 1,
                'type' => 2,
                'temperature' => '84℃',
                'note' => '女性用低温多湿サウナ。\n３段雛壇サウナ、寝サウナ3つあり。',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );
        DB::table('saunas')->insert(
            [
                'sauna_facility_id' => 1,
                'type' => 4,
                'temperature' => '85~89℃',
                'note' => '男性用低温多湿サウナ。\nセルフロウリュ可能。',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );
    }
}
