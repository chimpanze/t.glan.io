<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5f1478837466dRelationshipsToStringTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('strings', function(Blueprint $table) {
            if (!Schema::hasColumn('strings', 'project_id')) {
                $table->integer('project_id')->unsigned()->nullable();
                $table->foreign('project_id', '48970_5f147882664b9')->references('id')->on('projects')->onDelete('cascade');
                }
                if (!Schema::hasColumn('strings', 'context_id')) {
                $table->integer('context_id')->unsigned()->nullable();
                $table->foreign('context_id', '48970_5f1478826c424')->references('id')->on('contexts')->onDelete('cascade');
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
        Schema::table('strings', function(Blueprint $table) {
            
        });
    }
}
