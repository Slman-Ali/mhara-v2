<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstituteReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institute_reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('institute_id');
            $table->text('text');
            $table->double('stars', null, 1)->default(1);
            $table->bigInteger('student_id');
            $table->bigInteger('course_id');
            $table->bigInteger('parameter_id');
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
        Schema::dropIfExists('institute_reviews');
    }
}
