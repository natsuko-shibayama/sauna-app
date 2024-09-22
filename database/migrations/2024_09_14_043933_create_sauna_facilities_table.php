<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sauna_facilities', function (Blueprint $table) {
            $table->id();  // 主キー
            $table->string('name')->comment('サウナ施設名');
            $table->string('postal_code', 8)->comment('郵便番号');
            $table->string('prefecture')->comment('都道府県');
            $table->text('city')->comment('市区町村');
            $table->text('address')->nullable()->comment('それ以降の住所');
            $table->text('access')->comment('アクセス');
            $table->text('location_map')->nullable()->comment('地図');
            $table->text('price')->comment('料金');
            $table->text('image_path')->nullable()->comment('画像');
            $table->text('sauna_comment')->comment('サウナの備考');
            $table->boolean('has_loyly')->comment('ロウリュの有無');
            $table->text('loyly_comment')->comment('ロウリュの備考');
            $table->boolean('has_water_bath')->comment('水風呂の有無');
            $table->text('water_bath_comment')->comment('水風呂の備考');
            $table->boolean('has_outdoor_bath')->comment('外気浴の有無');
            $table->boolean('has_chair')->comment('ととのい椅子の有無');
            $table->text('chair_comment')->comment('ととのい椅子の備考');
            $table->timestamps();  // 作成日時・更新日時
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sauna_facilities');
    }
};
