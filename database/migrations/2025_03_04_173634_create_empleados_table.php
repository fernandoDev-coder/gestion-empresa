<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido_primero');
            $table->string('apellido_segundo')->nullable();
            $table->string('rol')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('dni')->unique();
            $table->string('email')->unique();
            $table->unsignedBigInteger('oficina_id');
            $table->foreign('oficina_id')->references('id')->on('oficinas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('empleados');
    }
};
