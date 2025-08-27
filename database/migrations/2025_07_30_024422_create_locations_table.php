<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->bigIncrements('lcn_id');
            $table->string('lcn_name');
            $table->string('lcn_block')->nullable();
            $table->string('lcn_img_path')->nullable();

            $table->timestamp('lcn_created_at')->nullable();
            $table->timestamp('lcn_updated_at')->nullable();
            $table->timestamp('lcn_deleted_at')->nullable();

            $table->unsignedBigInteger('lcn_created_by');
            $table->unsignedBigInteger('lcn_updated_by')->nullable();
            $table->unsignedBigInteger('lcn_deleted_by')->nullable();

            $table->string('lcn_sys_note')->nullable();
            $table->double('lcn_latitude', 10, 7)->nullable();
            $table->double('lcn_longitude', 10, 7)->nullable();

            $table->foreign('lcn_created_by')->references('usr_id')->on('users');
            $table->foreign('lcn_updated_by')->references('usr_id')->on('users');
            $table->foreign('lcn_deleted_by')->references('usr_id')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
