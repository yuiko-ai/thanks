<?php

declare(strict_types=1);

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
        Schema::table('thanks', function (Blueprint $table) {
            //
            $table->renameColumn('receive_user_id', 'receive_user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('thanks', function (Blueprint $table) {
            //
            $table->renameColumn('receive_user_id', 'receive_user_id');
        });
    }
};
