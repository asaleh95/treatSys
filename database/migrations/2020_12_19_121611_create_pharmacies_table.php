<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePharmaciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmacies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->point('location')->nullable();
            $table->integer('discount');
            $table->string('region');
            $table->string('address');
            $table->float('distance', 3 , 1);
            $table->enum('rate', [0,1,2,3,4,5]);
            $table->integer('number_of_raters');
            $table->integer('number_of_views');
            $table->text('about');
            $table->text('logo');
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
        Schema::dropIfExists('pharmacies');
    }
}
