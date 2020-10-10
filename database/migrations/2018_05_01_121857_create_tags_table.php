<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50); // Maximum size of 50 characters
            $table->string('slug', 50);
            $table->timestamps();
        });

        Schema::create('status_tag', function (Blueprint $table) {
            $table->integer('status_id');
            $table->integer('tag_id');
            $table->primary(['status_id', 'tag_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status_tag');
        Schema::dropIfExists('tags');
    }
}
