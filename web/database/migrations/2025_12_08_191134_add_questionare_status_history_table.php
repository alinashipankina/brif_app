<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("questionare_status_histories", function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId("questionare_id")
                ->constrained('questionares')
                ->onDelete('cascade');
            $table->string("status")->nullable(false);
            $table->string("comment")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questionare_status_histories');
    }
};
