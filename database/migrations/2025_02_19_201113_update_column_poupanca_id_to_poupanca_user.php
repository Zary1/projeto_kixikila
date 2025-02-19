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
        Schema::table('poupanca_user', function (Blueprint $table) {
            //
            $table->dropForeign(['poupanca_id']);

            // Agora, recria com ON DELETE CASCADE
            $table->foreign('poupanca_id')
                ->references('id')
                ->on('poupancas')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('poupanca_user', function (Blueprint $table) {
            //
            $table->dropForeign(['poupanca_id']);

            // Recria a original sem o cascade
            $table->foreign('poupanca_id')
                ->references('id')
                ->on('poupancas');
        });
    }
};
