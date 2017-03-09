<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimelinesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('timelines', function (Blueprint $table) {
      $table->increments('id');
      $table->unsignedInteger('id_user');
      $table->string('event_name');
      $table->timestamps('date');
      
      $table->foreign('id_user')
        ->references('id')->on('users')
        ->onDelete('cascade')->onUpdate('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('timelines');
  }
}
