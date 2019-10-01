<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('mid_name')->nullable();
            $table->string('last_name');
            $table->string('mobile')->nullable();
            
            $table->string('identity_image')->nullable();
            $table->string('image')->nullable();
            $table->string('certificate_image')->nullable();
            $table->string('experience_image')->nullable();

            $table->integer('city')->nullable();
            $table->integer('region')->nullable();
            $table->string('address')->nullable();
            $table->date('birth_date')->nullable();
            $table->integer('gender')->nullable();
            $table->string('tagline')->nullable();
            
            $table->string('available_days',7)->default("0111111");
            $table->integer('available_time')->nullable();
            
            $table->string('facebook')->nullable();
            $table->string('whatsapp')->nullable();
            $table->bigInteger('profile_visitors')->default(0);
            $table->double('stars_num',null,2)->default(0);
            $table->integer('num_of_reviews')->default(0);

            $table->integer('priority_by_admin')->default(0);
            
            
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
        Schema::dropIfExists('tutors');
    }
}
