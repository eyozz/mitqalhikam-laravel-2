<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('news_posts', function (Blueprint $table): void {
            $table->string('thumbnail_path')->nullable()->after('image_url');
            $table->enum('status', ['draft', 'published'])->default('published')->after('is_featured')->index();
        });
    }

    public function down(): void
    {
        Schema::table('news_posts', function (Blueprint $table): void {
            $table->dropColumn(['thumbnail_path', 'status']);
        });
    }
};
