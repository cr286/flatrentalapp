<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyers', function (Blueprint $table) {
            $table->id();
            $table->string("FirstName");
            $table->string("LastName");
            $table->string("MiddleName");
            $table->date("DateOfBirth");
            $table->string("ContactPhone");
            $table->string("Address");
            $table->string("City");
            $table->string("State");
            $table->string("Country");  
            $table->string("UserID");  
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
        Schema::dropIfExists('buyers');
    }
}
