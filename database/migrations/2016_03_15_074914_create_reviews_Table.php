<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
         Schema::create('reviews', function (Blueprint $table) {
            $table->integer('review_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('review_name');
          
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
         
            $table->primary(['review_id']);
          
        });   
 
   }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
    }
}
