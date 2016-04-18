<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function(Blueprint $table) {
            $table->increments('id');
            $table->string('username', 16);
            $table->string('password', 100);
            $table->string('display_name', 100);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table
                ->unsignedInteger('author_id')
                ->nullable()
                ->after('body');
            $table
                ->foreign('author_id')
                ->references('id')->on('users')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        Schema::drop('users');

        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign('posts_author_id_foreign');
        });

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }

}
