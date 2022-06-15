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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string("course_title", 500)->nullable();
            $table->string("course_title_en", 500)->nullable();
            $table->string("course_description", 500)->nullable();
            $table->string("course_description_en", 500)->nullable();
            $table->string("course_prerequisite", 500)->nullable();
            $table->string("course_prerequisite_en", 500)->nullable();
            $table->string("course_eligibility", 500)->nullable();
            $table->string("course_eligibility_en", 500)->nullable();
            $table->string("course_cover_image")->nullable();
            $table->unsignedInteger("course_duration")->default(30);
            $table->unsignedFloat("cost", 8, 2)->default(0.0);
            $table->unsignedInteger('overall_rating')->default(0);
            $table->unsignedInteger('test_count')->default(1);
            $table->boolean('is_published')->default(false);
            //$table->foreignId('trainer_id')->nullable()->constrained("trainer")->onUpdate("cascade")->onDelete("set null");
           $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedTinyInteger("row_status")->default(1);
            $table->softDeletes();
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
        Schema::dropIfExists('courses');
    }
};
