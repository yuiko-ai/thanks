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
        Schema::create('mails', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('send_user_id');
            $table->foreign('send_user_id')->references('id')->on('users');
            $table->unsignedBigInteger('recieve_user_id');
            $table->foreign('recieve_user_id')->references('id')->on('users');
            $table->string('text');
            $table->timestamp('delete_at_time')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mails');
    }
};
