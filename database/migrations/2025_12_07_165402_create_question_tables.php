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
        Schema::create('questionares', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string("company_name")->nullable(false);
            $table->string("role")->nullable(true);
            $table->string("phone")->nullable(true);
            $table->string("email")->nullable(false);
            $table->string("usluga")->nullable(false);
            $table->unsignedBigInteger("user_id")->nullable(true);
            $table->string("status")->nullable(false);

            $table->foreign("user_id")->references("id")->on("users");
        });

        Schema::create("questionare_fields", function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger("questionare_id")->nullable(false);
            $table->string("field_name")->nullable(false);
            $table->string("field_value")->nullable(false);

            $table->foreign("questionare_id")->references("id")->on("questionares");
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_tables');
    }
};
