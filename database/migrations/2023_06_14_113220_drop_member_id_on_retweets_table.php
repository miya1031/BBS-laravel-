<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('retweets', function (Blueprint $table): void {
            $table->dropForeign('retweets_member_id_foreign');
            $table->dropColumn('member_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('retweets', function (Blueprint $table): void {
            $table->foreignId('member_id')->constrained()->onDelete('cascade');
        });
    }
};
