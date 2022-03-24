<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            // store the ID of the person that created the check
            $table->bigInteger('person_id')->unsigned();
            $table->foreign('person_id')->references('id')->on('people');

            // store the ID of the asset this check refers to
            $table->bigInteger('asset_id')->unsigned()->nullable();
            $table->foreign('asset_id')->references('id')->on('assets');

            // store a link to the signature image
            $table->string('signature_image');

            // store GPS coordinates of where the check was done, if available
            $table->string('gps_coordinates')->nullable();

            // store a comment for the check, if one has been provided
            $table->text('comment')->nullable();

            // store links of up to 3 images, if any have been provided
            $table->string('image_1')->nullable();
            $table->string('image_2')->nullable();
            $table->string('image_3')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checks');
    }
}
