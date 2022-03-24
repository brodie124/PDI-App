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

            // store the type of the checklist item
            $table->string('type')->nullable();

            // store the description of the checklist item
            $table->text('description')->nullable();

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
