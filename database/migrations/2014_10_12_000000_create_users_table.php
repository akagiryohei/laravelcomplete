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
            $table->bigIncrements('id');
            $table->string('name','255');
            $table->string('email','255')->unique();//重複を防ぐ
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password','255');
            $table->rememberToken();
            $table->string('phone_number','100')->nullable();
            $table->string('postcode','100')->nullable();
            $table->string('prefecture_id','100')->nullable();
            $table->tinyInteger('role')->default(1);
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
