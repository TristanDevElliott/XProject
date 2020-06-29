<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->longText('content')->nullable();
            $table->longText('excerpt')->nullable();
            $table->string('status')->nullable();
            $table->string('visibility')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
