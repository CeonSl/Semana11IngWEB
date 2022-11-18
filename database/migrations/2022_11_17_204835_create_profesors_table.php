<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesors', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('depto_id')->nullable();
            $table->foreign('depto_id')->references('id')->on('deptos')
            ->onDelete('set null');

            $table->string('nombre',60);
            $table->string('direccion');
            $table->integer('telefono');

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
        Schema::dropIfExists('profesors');
    }
};
