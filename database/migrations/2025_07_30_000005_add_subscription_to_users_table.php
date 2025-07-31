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
        Schema::table('users', function (Blueprint $table) {
            // Agrega la clave foránea para 'plan_id' (que ya tenías)
            $table->unsignedBigInteger('plan_id')->nullable();
            $table->foreign('plan_id')
                  ->references('id')
                  ->on('plans')
                  ->onDelete('set null');

            // --- Nuevas líneas para la clave foránea de 'payment_id' ---
            $table->unsignedBigInteger('payment_id')->nullable(); // Columna para almacenar el ID del pago
            $table->foreign('payment_id') // Define la clave foránea
                  ->references('id') // Hace referencia a la columna 'id'
                  ->on('payment') // En la tabla 'payments'
                  ->onDelete('set null'); // Si un pago se elimina, el payment_id en users se establece a NULL
            // --------------------------------------------------------
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Elimina la clave foránea y la columna 'plan_id'
            $table->dropForeign(['plan_id']);
            $table->dropColumn('plan_id');

            // --- Nuevas líneas para revertir la clave foránea de 'payment_id' ---
            $table->dropForeign(['payment_id']); // Elimina la restricción de clave foránea
            $table->dropColumn('payment_id'); // Elimina la columna 'payment_id'
            // -----------------------------------------------------------------
        });
    }
};