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
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('key', 100)->unique();
            $table->string('module_name', 255);
            $table->unsignedTinyInteger('method')->comment("1 => GET, 2 => POST, 3 => PUT, 4 => PATCH, 5 => DELETE");
            $table->unsignedTinyInteger('row_status')->default(1);

            $table->timestamps();
            
            // $table->unique(['uri', 'method'], 'perm_uri_method_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permissions');
    }
};
