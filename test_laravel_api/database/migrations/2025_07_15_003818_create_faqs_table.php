<?php
// database/migrations/2025_07_15_000000_create_faqs_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->text('answer');
            $table->enum('match_type', ['exact', 'contains', 'regex'])->default('contains');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('faqs');
    }
};

