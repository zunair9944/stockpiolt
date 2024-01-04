<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Team extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team', function (Blueprint $table) {
            $table->id(); 
            $table->string('slug', 255);
            $table->string('name', 255);  
            $table->string('dsignation', 255);  
            $table->text('description')->nullable(); 
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
        Schema::dropIfExists('team');
    }
}
