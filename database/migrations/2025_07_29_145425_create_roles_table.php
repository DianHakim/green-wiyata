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
        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('rl_id');
            $table->string('rl_name', 255);
            $table->string('rl_description', 255)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('rl_create_by');
            $table->unsignedBigInteger('rl_update_by')->nullable();
            $table->unsignedBigInteger('rl_deleted_by')->nullable();
            $table->string('rl_sys_note', 255)->nullable();

            $table->foreign('rl_create_by')->references('id')->on('users');
            $table->foreign('rl_update_by')->references('id')->on('users');
            $table->foreign('rl_deleted_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
