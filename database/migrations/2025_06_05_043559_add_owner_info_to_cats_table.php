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
        Schema::table('cats', function (Blueprint $table) {
            $table->string('owner_name')->nullable();
            $table->string('owner_contact')->nullable();
            $table->text('owner_address')->nullable();
        });
    }

    public function down()
    {
        Schema::table('cats', function (Blueprint $table) {
            $table->dropColumn(['owner_name', 'owner_contact', 'owner_address']);
        });
    }
};
