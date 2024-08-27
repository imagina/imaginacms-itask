<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itask__priority_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('priority_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title');
            $table->string('description');
            $table->unique(['priority_id', 'locale']);
            $table->foreign('priority_id')->references('id')->on('itask__priorities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('itask__priority_translations', function (Blueprint $table) {
            $table->dropForeign(['priority_id']);
        });
        Schema::dropIfExists('itask__priority_translations');
    }
};
