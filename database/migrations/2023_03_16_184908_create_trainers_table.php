<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainers', function (Blueprint $table) {
            $table->id();
                $table->string('name');
                $table->string('image');
                $table->string('CV');
                $table->string('phone_number');
                $table->string('years_experint');
                $table->string('carrer');
                $table->string('facebook');
                $table->string('tweeter');
                $table->string('LinkedIn');
                $table->softDeletes();

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
        Schema::dropIfExists('trainers');
    }
};
