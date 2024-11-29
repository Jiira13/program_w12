<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('games', function (Blueprint $table) {
            $table->string('image')->nullable(); // Add a nullable image column
        });
    }
    
    public function down()
    {
        Schema::table('games', function (Blueprint $table) {
            $table->dropColumn('image'); // Remove the image column on rollback
        });
    }
    
};
