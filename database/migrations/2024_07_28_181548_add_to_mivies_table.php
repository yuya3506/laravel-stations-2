<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddToMiviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->integer('published_year');
            $table->text('description');
            $table->tinyInteger('is_showing')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('movies', function (Blueprint $table) {
            // $table->dropColumn('published_year');
            // $table->dropColumn('description');
            // $table->dropColumn('is_showing');
            // $table->dropColumn('created_at');
            // $table->dropColumn('updated_at');
        });
    }
}
