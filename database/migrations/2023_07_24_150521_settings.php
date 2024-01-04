<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Settings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_title', 255);
            $table->string('phone', 20);
            $table->string('email', 255);
            $table->text('address');
            $table->text('country');
            $table->text('map');
            $table->string('fb_link', 255);
            $table->string('tw_link', 255);
            $table->string('messenger_link', 255);
            $table->string('in_link', 255);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}