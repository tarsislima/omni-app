<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChannelsForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('channels_users', function ($table) {
            $table->foreign('channel_id')->references('id')->on('channels');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unique(['channel_id', 'identifier'], 'unique_identifier');
        });

        Schema::table('channel_users_messages', function ($table) {
            $table->foreign('channel_user_id')->references('id')->on('channels_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('channels_users', function ($table) {
            $table->dropForeign(['channel_id']);
            $table->dropForeign(['user_id']);
        });

        Schema::table('channel_users_messages', function ($table) {
            $table->dropForeign(['channel_user_id']);
        });
    }
}
