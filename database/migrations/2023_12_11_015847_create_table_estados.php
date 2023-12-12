<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('estados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion');
            $table->timestamps();
            //
        });
        DB::table('estados')->insert([
            ['nombre' => 'TO DO', 'descripcion' => 'Tareas por hacer'],
            ['nombre' => 'In Progress', 'descripcion' => 'Tareas en progreso'],
            ['nombre' => 'Done', 'descripcion' => 'Tareas realizadas'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estados');
    }
};
