<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5f1476ff39606RelationshipsToLanguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('languages', function(Blueprint $table) {
            if (!Schema::hasColumn('languages', 'project_id')) {
                $table->integer('project_id')->unsigned()->nullable();
                $table->foreign('project_id', '48968_5f1476fe2a48e')->references('id')->on('projects')->onDelete('cascade');
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
        Schema::table('languages', function(Blueprint $table) {
            
        });
    }
}
