<?php

# Result of "php artisan generate:pivot groups members"

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGroupMemberTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_member', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('group_id')->unsigned()->index();
            // $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
            $table->integer('member_id')->unsigned()->index();
            // $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
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
        Schema::drop('group_member');
    }

}
