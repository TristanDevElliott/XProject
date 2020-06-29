<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('app_name')->nullable();
            $table->string('app_description')->nullable();
            $table->string('app_keywords')->nullable();
            $table->string('app_author')->nullable();
            $table->string('app_author_link')->nullable();
            $table->string('users_can_register')->nullable();
            $table->string('admin_email')->nullable();
            $table->string('posts_per_page')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
