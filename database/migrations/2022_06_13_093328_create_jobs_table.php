<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('category')
                ->nullable()
                ->comment('1=> accounting');
            $table->string('circular_title');
            $table->string('job_title');
            $table->string('vacancy_no')->default(0);
            $table->string('salary_min');
            $table->string('salary_max');
            $table->unsignedTinyInteger('job_status')
                ->default(1)
                ->comment('1 => draft, 2=>published' );
            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
};
