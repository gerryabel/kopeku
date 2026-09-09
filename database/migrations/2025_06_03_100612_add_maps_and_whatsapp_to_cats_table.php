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
        Schema::table('cats', function (Blueprint $table) {
            $table->string('maps_link')->nullable();
            $table->string('owner_whatsapp')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('cats', function (Blueprint $table) {
            $table->dropColumn(['maps_link', 'owner_whatsapp']);
        });
    }
};
