<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVisibilityToComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    //add column 'visibility' to 'comments'
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->integer('visibility')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropColumn('visibility');
        });
    }
}
