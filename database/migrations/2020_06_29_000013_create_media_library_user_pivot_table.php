<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaLibraryUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('media_library_user', function (Blueprint $table) {
            $table->unsignedInteger('media_library_id');
            $table->foreign('media_library_id', 'media_library_id_fk_1742589')->references('id')->on('media_libraries')->onDelete('cascade');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_1742589')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
