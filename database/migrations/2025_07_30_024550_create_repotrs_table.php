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
        Schema::create('repotrs', function (Blueprint $table) {
            $table->bigIncrements('rps_id');
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('rps_create_by');
            $table->unsignedBigInteger('rps_update_by')->nullable();
            $table->unsignedBigInteger('rps_deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->string('rps_sys_note', 255)->nullable();

            $table->foreign('post_id')->references('pst_id')->on('posts');
            $table->foreign('rps_create_by')->references('id')->on('users');
            $table->foreign('rps_update_by')->references('id')->on('users');
            $table->foreign('rps_deleted_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repotrs');
    }
};
