<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('questionares', function (Blueprint $table) {
            $table->float('prediction_probability')->nullable()->after('status');
            $table->boolean('prediction_will_buy')->nullable()->after('prediction_probability');
            $table->string('prediction_confidence')->nullable()->after('prediction_will_buy');
            $table->json('prediction_raw')->nullable()->after('prediction_confidence');
            $table->timestamp('predicted_at')->nullable()->after('prediction_raw');
        });
    }

    public function down()
    {
        Schema::table('questionares', function (Blueprint $table) {
            $table->dropColumn([
                'prediction_probability',
                'prediction_will_buy',
                'prediction_confidence',
                'prediction_raw',
                'predicted_at'
            ]);
        });
    }
};
