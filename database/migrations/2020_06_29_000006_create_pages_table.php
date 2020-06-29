<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->longText('content')->nullable();
            $table->string('visibility')->nullable();
            $table->string('slug')->nullable();
            $table->boolean('allow_comments')->default(0)->nullable();
            $table->longText('content_body')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
