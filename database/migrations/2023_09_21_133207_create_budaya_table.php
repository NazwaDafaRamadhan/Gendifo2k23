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
        Schema::create('budaya', function (Blueprint $table) {
            $table->id('id_budaya');
            $table->string('budaya')->nullable();
            $table->string('kontak')->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('singkat')->nullable();
            $table->string('notelp')->nullable();
            $table->string('gambar')->nullable();
            $table->string('video')->nullable();
            $table->string('link_post_ig')->nullable();
            $table->string('link_post_tiktok')->nullable();
            $table->string('link_post_yt')->nullable();
            $table->string('created_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budaya');
    }
};
