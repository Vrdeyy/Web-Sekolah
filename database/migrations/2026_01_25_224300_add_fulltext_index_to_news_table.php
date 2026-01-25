<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('news', function (Blueprint $table) {
            // Add fulltext index to title and content
            // Using raw because old Laravel/MySQL versions might need it
            DB::statement('ALTER TABLE news ADD FULLTEXT fulltext_index (title, content)');
        });
    }

    public function down(): void
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropIndex('fulltext_index');
        });
    }
};
