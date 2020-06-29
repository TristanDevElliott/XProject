<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSettingsTable extends Migration
{
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->unsignedInteger('default_role_id')->nullable();
            $table->foreign('default_role_id', 'default_role_fk_1742456')->references('id')->on('roles');
        });
    }
}
