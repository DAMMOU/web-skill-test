<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('test_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        DB::table('test_categories')->insert([
            ['name' => 'JAVA', 'created_at' => now()],
            ['name' => 'PHP', 'created_at' => now()],
            ['name' => 'JAVASCRIPT', 'created_at' => now()],
            ['name' => 'HTML', 'created_at' => now()],
            ['name' => 'CSS', 'created_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_categories');
    }
};
