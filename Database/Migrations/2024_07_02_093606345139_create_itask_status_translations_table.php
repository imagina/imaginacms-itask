<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItaskStatusTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itask__status_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('status_id')->unsigned();
            $table->string('locale')->index();
            $table->text('title');
            $table->text('description')->nullable();
            $table->unique(['status_id', 'locale']);
            $table->foreign('status_id')->references('id')->on('itask__statuses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('itask__status_translations', function (Blueprint $table) {
            $table->dropForeign(['status_id']);
        });
        Schema::dropIfExists('itask__status_translations');
    }
}
