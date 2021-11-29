<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('email')->unique();
            $table->string('phone',15);
            $table->string('parentPhone',15)->nullable();
            $table->string('course',3)->nullable();
            $table->string('img')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('expertIn')->nullable();
            $table->string('eq')->nullable();
            $table->string('cv')->nullable();
            $table->string('Address')->nullable();
            $table->string('note')->nullable();
            $table->string('role_name');
            $table->integer('super_admin')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
