<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('sheet_data', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date')->nullable();
            $table->string('ticket')->nullable();
            $table->string('refcode')->nullable();
            $table->string('booth')->nullable();
            $table->string('status')->nullable();
            $table->string('cancelled_by')->nullable();
            $table->string('area', 50)->nullable();
            $table->string('reason_denied_ticket')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sheet_data');
    }
};
