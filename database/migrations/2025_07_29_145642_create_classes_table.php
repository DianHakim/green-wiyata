<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->bigIncrements('cls_id');
            $table->integer('cls_level');
            $table->unsignedBigInteger('mjr_id');
            $table->bigInteger('cls_number');
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('cls_created_by');
            $table->unsignedBigInteger('cls_updated_by')->nullable();
            $table->unsignedBigInteger('cls_deleted_by')->nullable();
            $table->string('cls_sys_note')->nullable();

            $table->foreign('mjr_id')->references('mjr_id')->on('majors');
            $table->foreign('cls_created_by')->references('usr_id')->on('users');
            $table->foreign('cls_updated_by')->references('usr_id')->on('users');
            $table->foreign('cls_deleted_by')->references('usr_id')->on('users');

            $table->renameColumn('updated_at', 'cls_updated_at');
            $table->renameColumn('created_at', 'cls_created_at');
            $table->renameColumn('deleted_at', 'cls_deleted_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
