<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class News extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id(); 
            $table->string('slug', 255);
            $table->integer('tag_id')->nullable();
            $table->string('title', 255);  
            $table->text('description')->nullable(); 
            $table->longText('post');
            $table->enum('status', ['active', 'inactive', 'pending'])->default('active');
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
        Schema::dropIfExists('news');
    }
}
