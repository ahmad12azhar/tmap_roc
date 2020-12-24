<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeFieldOnDrawingMap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('drawing_map', 'used')) {
            Schema::table('drawing_map', function (Blueprint $table) {
                $table->integer('used')->default(0)->nullable();
                $table->integer('occ')->default(0)->nullable();
                $table->integer('capacity')->default(0)->nullable();
                $table->integer('status')->default(1)->nullable();
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
        //
    }
}
