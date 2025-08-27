<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->bigIncrements('rps_id');
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('rps_created_by');
            $table->unsignedBigInteger('rps_updated_by')->nullable();
            $table->unsignedBigInteger('rps_deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->string('rps_sys_note', 255)->nullable();
            
            $table->foreign('post_id')->references('pst_id')->on('posts');
            $table->foreign('rps_created_by')->references('usr_id')->on('users');
            $table->foreign('rps_updated_by')->references('usr_id')->on('users');
            $table->foreign('rps_deleted_by')->references('usr_id')->on('users');

            $table->renameColumn('updated_at', 'rps_updated_at');
            $table->renameColumn('created_at', 'rps_created_at');
            $table->renameColumn('deleted_at', 'rps_deleted_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('repotrs');
    }
};
