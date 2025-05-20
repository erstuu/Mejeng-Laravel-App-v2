<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{   
    /**
     * Run the migrations.
     */
    public function up()
    {
        DB::statement("ALTER TABLE posts MODIFY category ENUM('pantai', 'gunung', 'air-terjun', 'goa', 'camping', 'perbukitan', 'danau', 'kuliner', 'budaya', 'keluarga') NOT NULL DEFAULT 'pantai'");
    }

    /**
     * Reverse the migrations.
     */
    
    public function down()
    {
        DB::statement("ALTER TABLE posts MODIFY category ENUM('travel', 'food', 'health', 'entertainment', 'technology', 'sports', 'lifestyle', 'education', 'business', 'politics') NOT NULL DEFAULT 'travel'");
    }
};
