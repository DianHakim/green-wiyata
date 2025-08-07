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
            $table->string('mjr_name');

            $table->timestamp('mjr_created_at')->nullable();
            $table->timestamp('mjr_updated_at')->nullable();
            $table->timestamp('mjr_deleted_at')->nullable();

            $table->unsignedBigInteger('mjr_created_by')->nullable();
            $table->unsignedBigInteger('mjr_deleted_by')->nullable();
            $table->unsignedBigInteger('mjr_updated_by')->nullable();

            $table->softDeletes();
            $table->string('mjr_sys_note')->nullable();

            $table->foreign('mjr_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('mjr_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('mjr_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
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
