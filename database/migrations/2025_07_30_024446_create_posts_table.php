<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('pst_id');
            $table->text('pst_content');
            $table->decimal('location_lat', 10, 7)->nullable();
            $table->decimal('location_lng', 10, 7)->nullable();
            $table->date('pst_date');
            $table->string('pst_img_path', 255)->nullable();
            $table->text('pst_description')->nullable();

            $table->timestamp('pst_created_at')->nullable();
            $table->timestamp('pst_updated_at')->nullable();
            $table->timestamp('pst_deleted_at')->nullable();

            $table->unsignedBigInteger('lcn_id')->nullable();
            $table->foreign('lcn_id')->references('lcn_id')->on('locations')->onDelete('set null');
            $table->unsignedBigInteger('pst_created_by');
            $table->unsignedBigInteger('pst_updated_by')->nullable();
            $table->unsignedBigInteger('pst_deleted_by')->nullable();
            $table->string('pst_sys_note', 255)->nullable();

            $table->unsignedBigInteger('pts_id')->nullable();
            $table->foreign('pts_id')->references('pts_id')->on('plants')->onDelete('cascade');
            $table->foreign('pst_created_by')->references('usr_id')->on('users');
            $table->foreign('pst_updated_by')->references('usr_id')->on('users');
            $table->foreign('pst_deleted_by')->references('usr_id')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
