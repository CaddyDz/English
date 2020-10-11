<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Cog\Laravel\Love\Support\Database\Migration;

final class CreateLoveReactersTable extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('love_reacters', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('type');
			$table->timestamps();
			$table->index('type');
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('love_reacters');
	}
}
