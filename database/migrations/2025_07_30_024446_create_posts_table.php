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
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('pst_id');
            $table->text('pst_content');
            $table->date('pst_date');
            $table->string('pst_img_path', 255)->nullable();
            $table->text('pst_description')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('pst_create_by');
            $table->unsignedBigInteger('pst_update_by')->nullable();
            $table->unsignedBigInteger('pst_deleted_by')->nullable();
            $table->softDeletes();
            $table->string('pst_sys_note', 255)->nullable();
            
            $table->foreign('pst_create_by')->references('id')->on('users');
            $table->foreign('pst_update_by')->references('id')->on('users');
            $table->foreign('pst_deleted_by')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
