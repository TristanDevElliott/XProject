<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaLibrariesTable extends Migration
{
    public function up()
    {
        Schema::create('media_libraries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('title_attribute')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
