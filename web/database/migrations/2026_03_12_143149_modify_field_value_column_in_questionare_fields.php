<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('questionare_fields', function (Blueprint $table) {
            // Меняем тип поля на TEXT
            $table->text('field_value')->change();
        });
    }

    public function down()
    {
        Schema::table('questionare_fields', function (Blueprint $table) {
            $table->string('field_value')->change();
        });
    }
};
