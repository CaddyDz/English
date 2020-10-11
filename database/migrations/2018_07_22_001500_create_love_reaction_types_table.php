<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Cog\Laravel\Love\Support\Database\Migration;

final class CreateLoveReactionTypesTable extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('love_reaction_types', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('name');
			$table->tinyInteger('mass');
			$table->timestamps();
			$table->index('name');
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('love_reaction_types');
	}
}
