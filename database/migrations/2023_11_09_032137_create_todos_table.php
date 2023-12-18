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
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->string('task_name');
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedTinyInteger('priority')->default(0)->comment('0: low, 1: medium, 2: high');
            $table->unsignedTinyInteger('status')->default(0)->comment('0: todo, 1: inprogress, 2: done');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todos');
    }
};
