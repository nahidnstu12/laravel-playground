<?php

namespace App\services;


use App\Models\Course;
use Illuminate\Support\Facades\DB;

class CourseService
{
    public const selection = [
    'course.id',
    'course.title',
    'courses.course_title_en',
    'courses.course_description',
    'courses.course_description_en',
    'courses.course_prerequisite',
    'courses.course_prerequisite_en',
    'courses.course_eligibility',
    'courses.course_eligibility_en',
    'courses.course_cover_image',
    'courses.course_duration',
    'courses.cost',
    'courses.overall_rating',
    'courses.test_count',
    'courses.is_published',
    'courses.row_status',
    'courses.created_by',
    'courses.updated_by',
    'courses.created_at',
    'courses.updated_at',
];

    public function validator(array $data, $id=null)
    {
        $rules = [
            'course_title' => ['required', 'string', 'max:300'],
            'course_title_en' => ['string', 'max:300', 'nullable'],
            'course_description' => ['required', 'string', 'max:400'],
            'course_description_en' => ['string', 'max:400'],
            'course_prerequisite' => ['required', 'string', 'max:400'],
            'course_prerequisite_en' => ['required', 'string', 'max:400'],
            'course_eligibility' => ['required', 'string', 'max:400'],
            'course_eligibility_en' => ['required', 'string', 'max:400'],
            'course_cover_image' => ['required', 'string', 'max:400', 'nullable'],
            'course_duration' => ['integer', 'required', 'between:7,365'],
            'overall_rating' => ['sometimes', 'integer', 'nullable', 'between:0,5'],
            'test_count' => ['sometimes', 'integer', 'nullable'],
            'is_published' => ['sometimes', 'boolean', 'nullable'],
        ];
        return \Illuminate\Support\Facades\Validator::make($data, $rules);

}

    public function store(array $data):Course
    {
        $course = new Course();
        $course->fill($data);
        $course->save();
        return  $course;
    }

    public function courseDetailWithTrainer(Course $course)
    {
        return Course::with([
            'courseChapters'=> function($query){
            $query->with(['courseLesson' => function($qr){
                $qr->select('id', 'lesson_title')->orderBy('order_lesson');

            }])->select('id','chapter_title')->orderBy('order_chapter');
            },
            'trainer'=> function($query){
            $query->with('user:name,id')->withCount('courses');
            },
            'skills'
        ])->withCount('lessons')->withSum('lessons as totalDuration', 'lesson_duratio')
            ->where('id', $course->id)->firstOrFail();

    }

    public function checkAndApprove($course, $youth)
    {
        DB::beginTransaction();
        try {
            $enrollment = CourseEnrollment::where('course_id',$course->id)
                ->where('youth_id', $youth->id)
                ->first();
            $enrollment->update(
                [
                    'tsp_approval' => true,
                    'row_status' => 1
                ]
            );
                DB::commit();
                return [
                    'status' => true,
                    'message'=>'Enrollment Approved'
                ];
        }catch (\Throwable $exception){
            DB::rollBack();
            Log::debug($exception->getMessage());
            return [
                'status'=>false,
                'message'=>$exception->getMessage()
            ];
        }

    }
}
