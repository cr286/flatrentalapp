<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Apartment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->string('apartmentName');
            $table->text('location');  
            $table->text('purpose')->nullable(); 
            $table->longtext('description')->nullable();   
            $table->double('Price');   
            $table->float('longitude')->nullable();   
            $table->float('latitude')->nullable();  
            $table->boolean('isActive')->nullable();   
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('apartments');
    }
}
