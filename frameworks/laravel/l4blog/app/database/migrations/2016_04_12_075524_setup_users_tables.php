<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetupUsersTables extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    
    // Creates the users table
    Schema::create('users', function ($table) {
      $table->increments('id');
      $table->string('username')->unique();
      $table->string('display_name')->nullable();
      $table->string('avatar')->nullable();
      $table->string('email')->unique();
      $table->string('password');
      $table->string('confirmation_code');
      $table->string('remember_token')->nullable();
      $table->boolean('confirmed')->default(false);
      $table->timestamps();
      $table->softDeletes();
    });

    // Creates password reminders table
    Schema::create('password_reminders', function ($table) {
      $table->string('email');
      $table->string('token');
      $table->timestamp('created_at');
    });
    
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::drop('password_reminders');
    Schema::drop('users');
  }

}
