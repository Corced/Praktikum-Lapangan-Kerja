<?php

// database/migrations/xxxx_xx_xx_create_rawat_jalans_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
Schema::create('rapid_swabs', function (Blueprint $table) {
    $table->id();
    $table->string('question');
    $table->longText('answer'); // Can use longText for large HTML content
    $table->enum('match_type', ['exact', 'contains', 'regex'])->default('contains');
    $table->timestamps();
});

    }

    public function down(): void
    {
        Schema::dropIfExists('rapid_swabs');
    }
};


?>