<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRanksMetaTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ranks_meta_tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('name_in_data_base');
            $table->unsignedInteger('professionals_quantity');
            $table->unsignedInteger('appointments_average');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ranks_meta_tags');
    }
}
