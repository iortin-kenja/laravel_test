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
    public function up()    // Does whatever this migration was made for
    {                       // In this case, creating a table
        Schema::create('cards', function (Blueprint $table) {
            $table->id();                       // Here by default
            
            $table->string('name');             // Added by me
            $table->string('type');             // "
            $table->integer('current_limit');   // "
            
            $table->timestamps();               // Here by default
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()  // Undoes whatever was done in up()
    {
        Schema::dropIfExists('cards');
    }
};
