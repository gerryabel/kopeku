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
            $table->string('owner_name')->nullable()->after('description');
            $table->string('owner_contact')->nullable()->after('owner_name');
            $table->text('owner_address')->nullable()->after('owner_contact');
        });
    }

    public function down()
    {
        Schema::table('cat_submissions', function (Blueprint $table) {
            $table->dropColumn(['owner_name', 'owner_contact', 'owner_address']);
        });
    }
};
