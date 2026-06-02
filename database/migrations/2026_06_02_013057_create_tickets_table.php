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
        Schema::create('tickets', function (Blueprint $table) {
    $table->id();

    $table->string('ticket_number')->unique();

    $table->string('requester_name');

    $table->string('title');

    $table->text('description')->nullable();

    $table->enum('priority', [
        'Low',
        'Medium',
        'High'
    ])->default('Medium');

    $table->enum('status', [
        'Queue',
        'In Progress',
        'Waiting User',
        'Completed'
    ])->default('Queue');

    $table->integer('progress')->default(0);

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
