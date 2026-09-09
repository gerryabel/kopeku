<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('cat_submissions', function (Blueprint $table) {
            $table->boolean('is_available_for_adoption')->default(false)->after('status');
            // asumsikan kolom 'approved' ada, ubah letak sesuai kebutuhan
        });
    }

    public function down()
    {
        Schema::table('cat_submissions', function (Blueprint $table) {
            $table->dropColumn('is_available_for_adoption');
        });
    }
};
