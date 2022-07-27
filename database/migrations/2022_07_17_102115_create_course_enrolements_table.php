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
        Schema::create('course_enrolements', function (Blueprint $table) {
            $table->id();

            $table->foreignId('student_id')->nullable()
                ->constrained('students')
                ->cascadeOnUpdate()
                ->nullOnDelete();

            $table->foreignId('course_id')->nullable()
                ->constrained('courses')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->tinyInteger('tsp_approval')->default(0)->comment('0=>pending,1=>approved,2=>reject');
            $table->timestamp('enrolment_date')->default(now());
            $table->dateTime('complete_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_enrolements');
    }
};
