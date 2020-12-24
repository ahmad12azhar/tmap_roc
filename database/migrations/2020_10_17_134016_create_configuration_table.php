<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigurationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('configuration')) {
            Schema::create('configuration', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('site_title')->nullable();
                $table->string('site_tagline')->nullable();
                $table->text('site_description')->nullable();
                $table->string('email')->nullable();
                $table->string('address', 512)->nullable();
                $table->string('telephone', 150)->nullable();
                $table->string('namarek', 255)->nullable();
                $table->string('norek', 150)->nullable();
                $table->string('logo_path', 255)->nullable();
                $table->string('instagram')->nullable();
                $table->string('whatsapp')->nullable();
                $table->string('facebook')->nullable();
                $table->string('twitter')->nullable();
                $table->timestamps();
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
        Schema::dropIfExists('configuration');
    }
}
