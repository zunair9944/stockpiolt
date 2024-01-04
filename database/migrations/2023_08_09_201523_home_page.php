<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HomePage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homePage', function (Blueprint $table) {
            $table->id();
            $table->longText('body');
            $table->integer('user_id');
            $table->string('mataTitle', 255)->nullable();
            $table->text('mataDescription')->nullable();
            $table->string('mataTags', 255)->nullable();
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
        Schema::dropIfExists('homePage');
    }
}
