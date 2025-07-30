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
        Schema::create('type__plants', function (Blueprint $table) {
            $table->bigIncrements('tps_id');
            $table->string('tps_type', 255);
            $table->unsignedBigInteger('tps_create_by');
            $table->unsignedBigInteger('tps_update_by')->nullable();
            $table->unsignedBigInteger('tps_deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->string('tps_sys_note', 255)->nullable();

            $table->foreign('tps_create_by')->references('id')->on('users');
            $table->foreign('tps_update_by')->references('id')->on('users');
            $table->foreign('tps_deleted_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('type__plants');
    }
};
