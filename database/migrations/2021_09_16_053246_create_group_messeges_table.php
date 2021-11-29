<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupMessegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_messeges', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->integer('group_id');
            $table->integer('from_id');
            $table->integer('to_id');
            $table->integer('body');
            $table->integer('attachment');
            $table->integer('seen');
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
        Schema::dropIfExists('group_messeges');
    }
}
