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
        Schema::create('trashcan', function (Blueprint $table) {
            $table->bigIncrements('tbg_id');
            $table->string('tbg_name', 255);
            $table->integer('tbg_level');
            $table->string('tbg_code', 255);
            $table->string('tbg_img_path', 255)->nullable();
            $table->string('tbg_weight_kg', 255)->nullable();
            $table->unsignedBigInteger('locations_id');
            $table->unsignedBigInteger('tbg_created_by');
            $table->unsignedBigInteger('tbg_updated_by')->nullable();
            $table->unsignedBigInteger('tbg_deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->string('tbg_sys_note', 255)->nullable();

            $table->foreign('locations_id')->references('lcn_id')->on('locations');
            $table->foreign('tbg_created_by')->references('usr_id')->on('users');
            $table->foreign('tbg_updated_by')->references('usr_id')->on('users');
            $table->foreign('tbg_deleted_by')->references('usr_id')->on('users');

            $table->renameColumn('updated_at', 'tbg_updated_at');
            $table->renameColumn('created_at', 'tbg_created_at');
            $table->renameColumn('deleted_at', 'tbg_deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trashcans');
    }
};
