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
        Schema::create('customize_fields', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id');
            $table->string('label');
            $table->string('type');
            $table->string('value');
            $table->timestamps();

            $table->foreign('company_id', 'customize_fields_company_id_foreign')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customize_fields', function (Blueprint $table) {
            $table->dropForeign('customize_fields_company_id_foreign');
            $table->dropIfExists('customize_fields');
        });
    }
};
