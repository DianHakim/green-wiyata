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
            $table->string('pts_stok');
            $table->unsignedBigInteger('location_id');
            $table->unsignedBigInteger('tps_id');
            $table->unsignedBigInteger('pts_created_by')->nullable();
            $table->unsignedBigInteger('pts_updated_by')->nullable();
            $table->unsignedBigInteger('pts_deleted_by')->nullable();

            // custom timestamps
            $table->timestamp('pts_created_at')->nullable();
            $table->timestamp('pts_updated_at')->nullable();
            $table->timestamp('pts_deleted_at')->nullable();

            $table->string('pts_sys_note', 255)->nullable();

            // foreign keys
            $table->foreign('location_id')->references('lcn_id')->on('locations');
            $table->foreign('pts_created_by')->references('usr_id')->on('users');
            $table->foreign('pts_updated_by')->references('usr_id')->on('users');
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
