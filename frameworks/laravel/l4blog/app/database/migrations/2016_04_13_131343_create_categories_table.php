<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index();
            $table->string('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // Schema::table('posts', function (Blueprint $table) {
        // });

        Schema::table('posts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table
                ->unsignedInteger('category_id')
                ->nullable()
                ->after('body');
            $table
                ->foreign('category_id')
                ->references('id')->on('categories')
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
        Schema::drop('categories');

        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign('category_id');
        });
    }

}
