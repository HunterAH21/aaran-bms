<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        if (Aaran\Assets\Features\Customise::hasBooks()) {

            Schema::create('ledgers', function (Blueprint $table) {
                $table->id();
                $table->string('vname')->unique();
                $table->longText('description')->nullable();
                $table->foreignId('ledger_group_id')->references('id')->on('ledger_groups');
                $table->decimal('opening',13,2)->nullable();
                $table->date('opening_date')->nullable();
                $table->decimal('current',13,2)->nullable();
                $table->tinyInteger('active_id')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('ledgers');
    }
};
