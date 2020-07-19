<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5f1475db4ff1cPermissionRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('permission_role')) {
            Schema::create('permission_role', function (Blueprint $table) {
                $table->integer('permission_id')->unsigned()->nullable();
                $table->foreign('permission_id', 'fk_p_48964_48965_role_per_5f1475db4fff6')->references('id')->on('permissions')->onDelete('cascade');
                $table->integer('role_id')->unsigned()->nullable();
                $table->foreign('role_id', 'fk_p_48965_48964_permissi_5f1475db50088')->references('id')->on('roles')->onDelete('cascade');
                
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
        Schema::dropIfExists('permission_role');
    }
}
