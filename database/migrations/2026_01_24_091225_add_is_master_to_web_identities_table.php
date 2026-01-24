<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('web_identities', function (Blueprint $table) {
            $table->boolean('is_master')->default(false)->after('api_key_master');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('web_identities', function (Blueprint $table) {
            $table->dropColumn('is_master');
        });
    }
};
