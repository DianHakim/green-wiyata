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
            $table->bigIncrements('tcn_id');
            $table->string('tcn_name', 255);
            $table->integer('tcn_level');
            $table->string('tcn_code', 255);
            $table->string('tcn_img_path', 255)->nullable();
            $table->string('tcn_weight_kg', 255)->nullable();
            $table->unsignedBigInteger('locations_id');
            $table->unsignedBigInteger('tcn_created_by');
            $table->unsignedBigInteger('tcn_updated_by')->nullable();
            $table->unsignedBigInteger('tcn_deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->string('tcn_sys_note', 255)->nullable();
            
            $table->foreign('locations_id')->references('lcn_id')->on('locations');
            $table->foreign('tcn_created_by')->references('usr_id')->on('users');
            $table->foreign('tcn_updated_by')->references('usr_id')->on('users');
            $table->foreign('tcn_deleted_by')->references('usr_id')->on('users');

            $table->renameColumn('updated_at', 'tcn_updated_at');
            $table->renameColumn('created_at', 'tcn_created_at');
            $table->renameColumn('deleted_at', 'tcn_deleted_at');
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
