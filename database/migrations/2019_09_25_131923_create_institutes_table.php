<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institutes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('tagline');
            $table->string('website');
            $table->string('image');
            $table->string('mobile');
            $table->string('phone');
            $table->integer('city');
            $table->string('address');
            $table->integer('establishment_year');
            
            $table->string('available_days',7)->default("0000000");
            $table->integer('available_time')->nullable();

            $table->string('facebook')->nullable();
            $table->string('whatsapp')->nullable();
            
            $table->boolean('registered_in_mhara_program')->default(false);

            $table->bigInteger('profile_visitors')->default(0);
            $table->double('stars_num',null,2)->default(0);
            $table->integer('num_of_reviews')->default(0);
            
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
        Schema::dropIfExists('institutes');
    }
}
