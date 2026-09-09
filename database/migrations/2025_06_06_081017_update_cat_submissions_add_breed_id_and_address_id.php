<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCatSubmissionsAddBreedIdAndAddressId extends Migration
{
    public function up()
    {
        Schema::table('cat_submissions', function (Blueprint $table) {
            // Hapus kolom lama
            $table->dropColumn(['breed', 'owner_address']);

            // Tambah kolom baru
            $table->unsignedBigInteger('breed_id')->after('gender');
            $table->unsignedBigInteger('address_id')->after('owner_contact');

            // Tambah foreign key
            $table->foreign('breed_id')->references('id')->on('breeds')->onDelete('cascade');
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('cat_submissions', function (Blueprint $table) {
            // Drop foreign key dulu
            $table->dropForeign(['breed_id']);
            $table->dropForeign(['address_id']);

            // Drop kolom baru
            $table->dropColumn(['breed_id', 'address_id']);

            // Tambah kolom lama lagi (bisa sesuaikan tipe)
            $table->string('breed');
            $table->text('owner_address');
        });
    }
}
