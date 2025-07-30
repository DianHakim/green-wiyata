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
        Schema::create('majors', function (Blueprint $table) {
            $table->bigIncrements('mjr_id');
            $table->string('mjr_name', 255);
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('mjr_create_by');
            $table->unsignedBigInteger('mjr_update_by')->nullable();
            $table->unsignedBigInteger('mjr_deleted_by')->nullable();
            $table->string('mjr_sys_note', 255)->nullable();


            $table->foreign('mjr_create_by')->references('id')->on('users');
            $table->foreign('mjr_update_by')->references('id')->on('users');
            $table->foreign('mjr_deleted_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('majors');
    }
};
