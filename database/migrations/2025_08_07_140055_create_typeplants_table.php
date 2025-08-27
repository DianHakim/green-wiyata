<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('typeplants', function (Blueprint $table) {
    $table->bigIncrements('tps_id');
    $table->string('tps_type');
    $table->unsignedBigInteger('tps_created_by')->nullable();
    $table->unsignedBigInteger('tps_updated_by')->nullable();
    $table->unsignedBigInteger('tps_deleted_by')->nullable();

    $table->timestamp('tps_created_at')->nullable();
    $table->timestamp('tps_updated_at')->nullable();
    $table->timestamp('tps_deleted_at')->nullable();

    $table->string('tps_sys_note', 255)->nullable();

    $table->foreign('tps_created_by')->references('usr_id')->on('users');
    $table->foreign('tps_updated_by')->references('usr_id')->on('users');
    $table->foreign('tps_deleted_by')->references('usr_id')->on('users');
});

    }

    public function down(): void
    {
        Schema::dropIfExists('typeplants');
    }
};
