<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddPricesToProjectsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function(Blueprint $table) {
            $table->string('price_regular')->nullable();
            $table->string('price_extended')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function(Blueprint $table) {
            $table->dropColmn('price_regular');
            $table->dropColmn('price_extented');
        });
    }

}
