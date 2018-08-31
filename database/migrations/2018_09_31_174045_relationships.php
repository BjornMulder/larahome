<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Relationships extends Migration
{
    public function up(): void
    {
        Schema::table('homes', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('devices', function (Blueprint $table) {
            $table->foreign('device_type_id')->references('id')->on('device_types');
        });

        Schema::table('sequences', function (Blueprint $table) {
            $table->foreign('home_id')->references('id')->on('homes');
        });

        Schema::table('sequence_actions', function (Blueprint $table) {
            $table->foreign('action_id')->references('id')->on('actions');
        });

        Schema::table('action_parameters', function (Blueprint $table) {
            $table->foreign('action_id')->references('id')->on('actions');
        });

        Schema::table('user_devices', function (Blueprint $table) {
            $table->foreign('device_id')->references('id')->on('devices');
        });

        Schema::table('user_devices', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::table('homes', function (Blueprint $table) {
            $table->dropForeign('user_id')->references('id')->on('users');
        });

        Schema::table('devices', function (Blueprint $table) {
            $table->dropForeign('device_type_id')->references('id')->on('device_types');
        });

        Schema::table('sequences', function (Blueprint $table) {
            $table->dropForeign('home_id')->references('id')->on('homes');
        });

        Schema::table('sequence_actions', function (Blueprint $table) {
            $table->dropForeign('action_id')->references('id')->on('actions');
        });

        Schema::table('action_parameters', function (Blueprint $table) {
            $table->dropForeign('action_id')->references('id')->on('actions');
        });

        Schema::table('user_devices', function (Blueprint $table) {
            $table->dropForeign('device_id')->references('id')->on('devices');
        });

        Schema::table('user_devices', function (Blueprint $table) {
            $table->dropForeign('user_id')->references('id')->on('user');
        });
    }
}
