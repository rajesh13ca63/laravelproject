<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() { 
     Schema::create('perm_role', function (Blueprint $table) {
            $table->integer('role_id')->unsigned();
            $table->integer('permission_id')->unsigned();
            $table->integer('resource_id')->unsigned();
            
            $table->foreign('role_id')
                  ->references('id')
                  ->on('roles')
                  ->onDelete('cascade');
         
            $table->foreign('permission_id')
                  ->references('id')
                  ->on('permissions')
                  ->onDelete('cascade');
           
            $table->foreign('resource_id')
                  ->references('id')
                  ->on('resources')
                  ->onDelete('cascade');

            $table->primary(['role_id', 'permission_id', 'resource_id']);

            
        });   

    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
