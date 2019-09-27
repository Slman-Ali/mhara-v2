<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutor_courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('description')->nullable();
            
            $table->integer('initial_price');
            $table->integer('discount_price')->default(0);
            
            $table->integer('level');
            $table->integer('type');

            
            $table->double('stars_num',null,2)->default(0);
            $table->integer('num_of_reviews')->default(0);

            $table->bigInteger('views')->default(0);

            $table->integer('hours')->nullable();

            $table->bigInteger('user_id');
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
        Schema::dropIfExists('tutor_courses');
    }
}
