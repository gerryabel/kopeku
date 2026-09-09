<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGoogleMapsLinkToCatSubmissionsAndCatsTables extends Migration
{
    public function up()
    {
        Schema::table('cat_submissions', function (Blueprint $table) {
            $table->string('google_maps_link')->nullable()->after('owner_address');
        });

        Schema::table('cats', function (Blueprint $table) {
            $table->string('google_maps_link')->nullable()->after('owner_address');
        });
    }

    public function down()
    {
        Schema::table('cat_submissions', function (Blueprint $table) {
            $table->dropColumn('google_maps_link');
        });

        Schema::table('cats', function (Blueprint $table) {
            $table->dropColumn('google_maps_link');
        });
    }
}
