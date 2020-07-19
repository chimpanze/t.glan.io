<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5f1478e1c767eRelationshipsToTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('translations', function(Blueprint $table) {
            if (!Schema::hasColumn('translations', 'string_id')) {
                $table->integer('string_id')->unsigned()->nullable();
                $table->foreign('string_id', '48971_5f1478e0a3010')->references('id')->on('strings')->onDelete('cascade');
                }
                if (!Schema::hasColumn('translations', 'language_id')) {
                $table->integer('language_id')->unsigned()->nullable();
                $table->foreign('language_id', '48971_5f1478e0a936b')->references('id')->on('languages')->onDelete('cascade');
                }
                if (!Schema::hasColumn('translations', 'context_id')) {
                $table->integer('context_id')->unsigned()->nullable();
                $table->foreign('context_id', '48971_5f1478e0af658')->references('id')->on('contexts')->onDelete('cascade');
                }
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('translations', function(Blueprint $table) {
            
        });
    }
}
