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
        Schema::create('locations', function (Blueprint $table) {
            $table->bigIncrements('lcn_id');
            $table->string('lcn_name', 255);
            $table->string('lcn_block', 255)->nullable();
            $table->string('lcn_img_path', 255)->nullable();
            $table->unsignedBigInteger('lcn_create_by');
            $table->unsignedBigInteger('lcn_update_by')->nullable();
            $table->unsignedBigInteger('lcn_deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->string('lcn_sys_note', 255)->nullable();

            $table->foreign('lcn_create_by')->references('id')->on('users');
            $table->foreign('lcn_update_by')->references('id')->on('users');
            $table->foreign('lcn_deleted_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
