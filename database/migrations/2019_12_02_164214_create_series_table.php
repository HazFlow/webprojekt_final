<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('genre_id');
            $table->string('title');
            $table->text('description');
            $table->string('duration');
            $table->string('provider');
            $table->string('thumbnail');
            $table->double('total_raters')->default(0);
            $table->double('total_stars')->default(0);
            $table->string('series_slug');
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
        Schema::dropIfExists('series');
    }
}
