<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1595177089StringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('translation_strings')) {
            Schema::create('strings', function (Blueprint $table) {
                $table->increments('id');
                $table->string('key')->nullable();
                $table->string('description')->nullable();
                $table->text('placholder_configuration')->nullable();

                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('strings');
    }
}
