<?php

use Doctrine\DBAL\Schema\SchemaManagerFactory;
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
        //外部キーが制約されているテーブルから先に制約を解除
        Schema::table('mail',function(Blueprint $table){
            $table->dropForeign(['send_user_id']);
            $table->dropForeign(['recieve_user_id']);
        });

        //テーブル名を変更
        Schema::rename('user','users');
        Schema::rename('mail','mails');

        //mailsテーブルの外部キーを再度制約
        Schema::table('mails',function (Blueprint $table) {
            //新しいテーブル名(users)を参照するように設定
            $table->foreign('send_user_id')->references('id')->on('users');
            $table->foreign('recieve_user_id')->references('id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //先に外部キーを削除
        Schema::table('mails',function (Blueprint $table){
            $table->dropForeign(['send_user_id']);
            $table->dropForeign(['recieve_user_id']);
        });
        // テーブル名を元に戻す
        Schema::rename('users', 'user');
        Schema::rename('mails', 'mail');

        // mailテーブルに再度外部キー制約を設定
        Schema::table('mail', function (Blueprint $table) {
            $table->foreign('send_user_id')->references('id')->on('user');
            $table->foreign('recieve_user_id')->references('id')->on('user');
        });
    }
};
