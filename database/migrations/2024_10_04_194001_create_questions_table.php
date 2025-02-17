<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->string('question')->default(0)->nullable();
            $table->string('a')->default(0)->nullable();
            $table->string('b')->default(0)->nullable();
            $table->string('c')->default(0)->nullable();
            $table->string('d')->default(0)->nullable();
            $table->string('answer')->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
