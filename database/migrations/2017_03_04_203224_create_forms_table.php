<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('forms', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name');
      $table->string('slug')->unique();
      $table->integer('area_id')->unsigned();;
      $table->string('description');
      $table->text('data');
      $table->timestamps();
      $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('forms');
  }
}
