<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChecklistItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checklist_items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            // store the ID of the checklist this item belongs to
            $table->bigInteger('checklist_id')->unsigned();
            $table->foreign('checklist_id')->references('id')->on('checklists');

            // store the description of this checklist item
            // this is unique so that we cannot duplicate it in the future.
            // we will also have to ensure that users cannot change descriptions of
            // items, otherwise checks carried out in the past may not make sense
            $table->string('description')->unique();

            // store the value of this check
            $table->string('value')->nullable();

            // store the comment for this check, if one has been provided
            $table->text('comment')->nullable();

            // store up to 3 links for images for this check, if they have been provided
            $table->string('image_1')->nullable();
            $table->string('image_2')->nullable();
            $table->string('image_3')->nullable();

            // store whether this checklist item is in use or not
            // this will be used to allow deprecated checklist items to be retained
            $table->boolean('is_active')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checklist_items');
    }
}
