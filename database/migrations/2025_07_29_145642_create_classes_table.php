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
        Schema::create('classes', function (Blueprint $table) {
            $table->bigIncrements('cls_id');
            $table->integer('cls_level');
            $table->unsignedBigInteger('mjr_id');
            $table->bigInteger('cls_number');
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('cls_create_by');
            $table->unsignedBigInteger('cls_update_by')->nullable();
            $table->unsignedBigInteger('cls_deleted_by')->nullable();
            $table->string('cls_sys_note', 255)->nullable();

            $table->foreign('mjr_id')->references('mjr_id')->on('majors');
            $table->foreign('cls_create_by')->references('id')->on('users');
            $table->foreign('cls_update_by')->references('id')->on('users');
            $table->foreign('cls_deleted_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
