<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Cog\Laravel\Love\Support\Database\Migration;

final class CreateLoveReactantReactionCountersTable extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('love_reactant_reaction_counters', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->unsignedBigInteger('reactant_id');
			$table->unsignedBigInteger('reaction_type_id');
			$table->unsignedBigInteger('count');
			$table->decimal('weight', 13, 2);
			$table->timestamps();
			$table->index([
				'reactant_id',
				'reaction_type_id',
			], 'love_reactant_reaction_counters_reactant_reaction_type_index');
			$table->foreign('reactant_id')->references('id')->on('love_reactants')->onDelete('cascade');
			$table->foreign('reaction_type_id')->references('id')->on('love_reaction_types')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('love_reactant_reaction_counters');
	}
}
