<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Driver;
use App\Models\Gateway;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('driver_gateway', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Driver::class)
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignIdFor(Gateway::class)
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driver_gateway');
    }
};
