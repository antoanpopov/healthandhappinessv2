<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAuthorsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health__authors', function (Blueprint $table) {

            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->boolean('is_public')->default(0);

            $table->integer('created_by')->unsigned()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->after('id')->onUpdate('cascade')->onDelete('set null');
            $table->integer('updated_by')->unsigned()->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->after('id')->onUpdate('cascade')->onDelete('set null');
            $table->integer('deleted_by')->unsigned()->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->after('id')->onUpdate('cascade')->onDelete('set null');
            //dates
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('health__authors_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('locale')->index();
            $table->string('names');
            $table->string('slug')->unique();

            $table->unique(['author_id', 'locale']);

            //foreign keys
            $table->integer('author_id')->unsigned();
            $table->foreign('author_id')->references('id')->on('health__authors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('health__authors_translations');
        Schema::drop('health__authors');
    }
}
