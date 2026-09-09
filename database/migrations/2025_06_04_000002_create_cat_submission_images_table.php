<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatSubmissionImagesTable extends Migration
{
    public function up()
    {
        Schema::create('cat_submission_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cat_submission_id')->constrained('cat_submissions')->onDelete('cascade');
            $table->string('image_path');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cat_submission_images');
    }
}
