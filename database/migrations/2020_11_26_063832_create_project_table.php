<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_map', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('polygon_project');
            $table->string('name', 500);
            $table->string('uplink', 500);
            $table->string('tematik_project');
            $table->string('description', 500);
            $table->string('status');
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
        Schema::dropIfExists('project_map');
    }
}
