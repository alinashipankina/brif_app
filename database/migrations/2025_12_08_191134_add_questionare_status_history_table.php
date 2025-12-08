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

            $table->unsignedBigInteger("questionare_id")->nullable(false);
            $table->string("status")->nullable(false);
            $table->string("comment")->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
