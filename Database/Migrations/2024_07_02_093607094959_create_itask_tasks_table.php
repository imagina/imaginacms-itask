<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItaskTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itask__tasks', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your fields
            $table->text('title');
            $table->text('description');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->integer('estimated_time')->nullable();
            $table->integer('status_id')->unsigned();
            $table->integer('priority_id')->unsigned();
            $table->integer('assigned_to_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('itask__statuses')->onDelete('restrict');
            $table->foreign('priority_id')->references('id')->on('itask__priorities')->onDelete('restrict');
            $table->foreign('assigned_to_id')->references('id')->on(config('auth.table', 'users'))->onDelete('restrict');
            $table->foreign('category_id')->references('id')->on('itask__categories')->onDelete('restrict');
            
            // Audit fields
            $table->timestamps();
            $table->auditStamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('itask__tasks', function (Blueprint $table) {
            $table->dropForeign(['status_id']);
            $table->dropForeign(['priority_id']);
            $table->dropForeign(['assigned_to_id']);
            $table->dropForeign(['category_id']);
        });
        
        Schema::dropIfExists('itask__tasks');
    }
}
