<?php

use Cog\Laravel\Love\Support\Database\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

final class CreateLoveReactantReactionTotalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('love_reactant_reaction_totals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('reactant_id');
            $table->unsignedBigInteger('count');
            $table->decimal('weight', 13, 2);
            $table->timestamps();
            $table->foreign('reactant_id')->references('id')->on('love_reactants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('love_reactant_reaction_totals');
    }
}
