<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config', function (Blueprint $table) {
            $table->increments('id');
            $table->string('site_name')->default('');
            $table->string('logo')->default('');
            $table->string('tel')->default('');
            $table->string('tel_img')->nullable();
            $table->string('wxgzh')->default('');
            $table->string('record')->default('');
            $table->string('record_info')->nullable();
            $table->string('seo_key')->nullable();
            $table->string('seo_desc')->nullable();
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
        Schema::dropIfExists('config');
    }
}
