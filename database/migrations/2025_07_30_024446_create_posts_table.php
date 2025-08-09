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
            $table->softDeletes();

            $table->unsignedBigInteger('pst_created_by');
            $table->unsignedBigInteger('pst_updated_by')->nullable();
            $table->unsignedBigInteger('pst_deleted_by')->nullable();

            $table->string('pst_sys_note', 255)->nullable();

            $table->foreign('pst_created_by')->references('usr_id')->on('users');
            $table->foreign('pst_updated_by')->references('usr_id')->on('users');
            $table->foreign('pst_deleted_by')->references('usr_id')->on('users');

            $table->renameColumn('updated_at', 'pst_updated_at');
            $table->renameColumn('created_at', 'pst_created_at');
            $table->renameColumn('deleted_at', 'pst_deleted_at');
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
