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
        Schema::create('o_d_o_r_s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained(
                table: 'users',
                indexName : 'o_d_o_r_s_id_user'
            );
            $table->enum('jenis', ['rutin', 'insidentil']);
            $table->enum('stakeholder', ['internal', 'BNN','POLRI']);
            $table->timestamps();
            $table->String('room');
            $table->integer('HP');
            $table->integer('SAJAM');
            $table->integer('BARANGELEKTRONIK');
            $table->integer('NARKOBA');
            $table->Text('BA');
            $table->String('dokumentasi');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('o_d_o_r_s');
        Schema::dropIfExists('odor');
    }
};
