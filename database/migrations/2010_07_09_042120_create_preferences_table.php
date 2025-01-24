<?php

use App\Functions\Neo;
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
        Schema::create('preferences', function (Blueprint $table) {
            $table->id();
            $table->string('target_id');
            $table->string('target_type');

            $table->enum('language', array_keys(Neo::languagesList()));
            $table->enum('currency', array_keys(Neo::currenciesList()));
            $table->enum('report_frequency', Neo::periodsList());
            $table->enum('date_format', array_keys(Neo::formatsList()));
            $table->enum('theme_color', array_keys(Neo::themesList()));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preferences');
    }
};
