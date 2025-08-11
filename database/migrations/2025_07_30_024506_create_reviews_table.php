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
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('rvw_id');
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('rvw_nilai');
            $table->unsignedBigInteger('rvw_created_by');
            $table->unsignedBigInteger('rvw_updated_by')->nullable();
            $table->unsignedBigInteger('rvw_deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->string('rvw_sys_note', 255)->nullable();

            $table->foreign('post_id')->references('pst_id')->on('posts');
            $table->foreign('user_id')->references('usr_id')->on('users');
            $table->foreign('rvw_created_by')->references('usr_id')->on('users');
            $table->foreign('rvw_updated_by')->references('usr_id')->on('users');
            $table->foreign('rvw_deleted_by')->references('usr_id')->on('users');

            $table->renameColumn('updated_at', 'rvw_updated_at');
            $table->renameColumn('created_at', 'rvw_created_at');
            $table->renameColumn('deleted_at', 'rvw_deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
