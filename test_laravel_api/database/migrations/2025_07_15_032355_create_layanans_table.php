<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('layanans', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->text('answer');
            $table->enum('match_type', ['exact', 'contains', 'regex'])->default('contains');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('layanans');
    }
};