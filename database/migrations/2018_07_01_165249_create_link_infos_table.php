<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinkInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('link_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('http_status');
            $table->string('url');
            $table->string('url_fetched');
            $table->string('domain');
            $table->string('html_title')->nullable();
            $table->integer('content_length')->nullable();
            $table->string('content_type')->nullable();
            $table->unsignedInteger('link_id');
            $table->foreign('link_id')->references('id')->on('links')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
