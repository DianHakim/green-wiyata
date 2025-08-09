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
        Schema::create('typeplants', function (Blueprint $table) {
            $table->bigIncrements('tps_id');
            $table->string('tps_type');
            $table->unsignedBigInteger('tps_created_by')->nullable();
            $table->unsignedBigInteger('tps_updated_by')->nullable();
            $table->unsignedBigInteger('tps_deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->string('tps_sys_note', 255)->nullable();

            $table->foreign('tps_created_by')->references('usr_id')->on('users');
            $table->foreign('tps_updated_by')->references('usr_id')->on('users');
            $table->foreign('tps_deleted_by')->references('usr_id')->on('users');

            $table->renameColumn('updated_at', 'tps_updated_at');
            $table->renameColumn('created_at', 'tps_created_at');
            $table->renameColumn('deleted_at', 'tps_deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('typeplants');
    }
};
