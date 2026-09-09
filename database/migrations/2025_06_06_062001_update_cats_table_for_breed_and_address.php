<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('cats', function (Blueprint $table) {
            if (Schema::hasColumn('cats', 'breed')) {
                $table->dropColumn('breed');
            }

            if (Schema::hasColumn('cats', 'owner_address')) {
                $table->dropColumn('owner_address');
            }

            if (!Schema::hasColumn('cats', 'breed_id')) {
                $table->foreignId('breed_id')->constrained('breeds')->onDelete('restrict');
            }

            if (!Schema::hasColumn('cats', 'address_id')) {
                $table->foreignId('address_id')->nullable()->constrained('addresses')->onDelete('set null');
            }
        });
    }

    public function down(): void {
        Schema::table('cats', function (Blueprint $table) {
            if (!Schema::hasColumn('cats', 'breed')) {
                $table->string('breed')->nullable();
            }

            if (!Schema::hasColumn('cats', 'owner_address')) {
                $table->text('owner_address')->nullable();
            }

            if (Schema::hasColumn('cats', 'breed_id')) {
                $table->dropForeign(['breed_id']);
                $table->dropColumn('breed_id');
            }

            if (Schema::hasColumn('cats', 'address_id')) {
                $table->dropForeign(['address_id']);
                $table->dropColumn('address_id');
            }
        });
    }
};
