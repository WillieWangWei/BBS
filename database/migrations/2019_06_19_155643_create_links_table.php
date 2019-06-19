<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTable extends Migration
{
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->timestamps();
            $table->increments('id');
            $table->string('link')->comment('资源的链接')->index();
            $table->string('title')->comment('资源的描述')->index();
        });
    }

    public function down()
    {
        Schema::dropIfExists('links');
    }
}
