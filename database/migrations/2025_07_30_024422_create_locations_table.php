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
            $table->string('lcn_name');
            $table->string('lcn_block')->nullable();
            $table->string('lcn_img_path')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->unsignedBigInteger('lcn_created_by');
            $table->unsignedBigInteger('lcn_updated_by')->nullable();
            $table->unsignedBigInteger('lcn_deleted_by')->nullable();

            $table->string('lcn_sys_note')->nullable();

            $table->foreign('lcn_created_by')->references('usr_id')->on('users');
            $table->foreign('lcn_updated_by')->references('usr_id')->on('users');
            $table->foreign('lcn_deleted_by')->references('usr_id')->on('users');

            $table->renameColumn('updated_at', 'lcn_updated_at');
            $table->renameColumn('created_at', 'lcn_created_at');
            $table->renameColumn('deleted_at', 'lcn_deleted_at');
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
