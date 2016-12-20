<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Snippet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('snippet', function (Blueprint $table) {
            $table->increments('id');
            $table->string('snippet_name');
            $table->binary('serialize_condition');
            $table->enum('status', [0,1]);
            $table->timestamp('created_date')->nullable();
            $table->timestamp('modified_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('snippet');
    }
}
