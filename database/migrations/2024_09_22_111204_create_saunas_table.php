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
        Schema::create('saunas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sauna_facility_id')
                    ->constrained()               //sauna_facilityテーブルのidカラムと紐づける
                    ->onUpdate('cascade')//親テーブルのレコードが更新されたら同時に更新
                    ->onDelete('cascade')//親テーブルのレコードが削除されたら同時に削除
                    ->comment('施設ID');
            $table->string('type')->comment('種類');
            $table->string('temperature')->comment('温度');
            $table->text('note')->comment('備考');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saunas');
    }
};
