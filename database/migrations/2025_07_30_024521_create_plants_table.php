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
        Schema::create('plants', function (Blueprint $table) {
            $table->bigIncrements('pts_id');
            $table->string('pts_name', 255);
            $table->date('pts_date');
            $table->string('pts_img_path', 255)->nullable();
            $table->text('pts_description')->nullable();

            $table->unsignedBigInteger('location_id');
            $table->unsignedBigInteger('pts_create_by');
            $table->unsignedBigInteger('pts_update_by')->nullable();
            $table->unsignedBigInteger('pts_deleted_by')->nullable();

            $table->timestamps();
            $table->softDeletes();
            $table->string('pts_sys_note', 255)->nullable();

            $table->foreign('location_id')->references('lcn_id')->on('locations');
            $table->foreign('pts_create_by')->references('usr_id')->on('users');
            $table->foreign('pts_update_by')->references('usr_id')->on('users');
            $table->foreign('pts_deleted_by')->references('usr_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plants');
    }
};
