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
            $table->unsignedBigInteger('cat_submission_id')->nullable()->after('name');
            $table->foreign('cat_submission_id')->references('id')->on('cat_submissions')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cats', function (Blueprint $table) {
            $table->dropForeign(['cat_submission_id']);
            $table->dropColumn('cat_submission_id');
        });
    }
};
