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
        // Schema::table('mails', function (Blueprint $table) {
        //     //delete_atカラムを'deleted_at'に変更
        //     $table->renameColumn('delete_at','deleted_at');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mails', function (Blueprint $table) {
            // 'deleted_at'カラムを'delete_at'に戻す
            $table->renameColumn('deleted_at', 'delete_at');
        });
    }
};
