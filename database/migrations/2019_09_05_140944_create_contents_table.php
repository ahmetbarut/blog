<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->default("Girilmedi")->nullable();
            $table->string('logo')->default("Girilmedi")->nullable();
            $table->string('facebook')->default("Girilmedi")->nullable();
            $table->text('about')->default("Girilmedi")->nullable();
            $table->string('instagram')->default("Girilmedi")->nullable();
            $table->string('linkedin')->default("Girilmedi")->nullable();
            $table->string('github')->default("Girilmedi")->nullable();
            $table->string('email')->default("Girilmedi")->nullable();
            $table->string('youtube')->default("Girilmedi")->nullable();
            $table->string('pint')->default("Girilmedi")->nullable();
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
        Schema::dropIfExists('contents');
    }
}
