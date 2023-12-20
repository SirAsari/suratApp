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
        Schema::create('letters', function (Blueprint $table) {
            $table->id(); // primeri
            $table->unsignedBigInteger('letter_type_id');
            $table->foreign('letter_type_id')->references('id')->on('letter_types');
            $table->string('letter_perihal');
            $table->json('recipients');
            $table->text('content');
            $table->string('attachment')->nullable();
            $table->unsignedBigInteger('notulis_id')->nullable();
            $table->foreign('notulis_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
