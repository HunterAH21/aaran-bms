<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Aaran\AaranCore\Src\Customise::hasCommon()) {

            Schema::create('countries', function (Blueprint $table) {
                $table->id();
                $table->string('vname')->unique();
                $table->tinyInteger('active_id')->nullable();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
