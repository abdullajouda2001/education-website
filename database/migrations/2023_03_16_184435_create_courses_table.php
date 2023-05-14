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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->double('price');
            $table->string('sluge');
            $table->double('descount');
            $table->string('in_contint');
            $table->string('ex_contint');
            $table->string('image');
            $table->foreignId('category_id')->constraeind('categories','id');
            
            $table->enum('type',['payment','free'])->default('payment');
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
        Schema::dropIfExists('courses');
    }
};
