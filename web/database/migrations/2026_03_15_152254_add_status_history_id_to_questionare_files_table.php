<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('questionare_files', function (Blueprint $table) {
            $table->foreignId('status_history_id')
                ->nullable()
                ->constrained('questionare_status_histories')
                ->onDelete('cascade')
                ->after('questionare_id');
        });
    }

    public function down()
    {
        Schema::table('questionare_files', function (Blueprint $table) {
            $table->dropForeign(['status_history_id']);
            $table->dropColumn('status_history_id');
        });
    }
};
