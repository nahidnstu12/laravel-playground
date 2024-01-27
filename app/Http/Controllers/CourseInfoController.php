<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseEnrolement;
use App\Models\Student;
use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CourseInfoController extends Controller
{
    const PATH = 'course-info.';
    public function get_courses():View
    {
        $courses = Course::with('trainer')->get();
//        ->dd();
        return view(self::PATH . 'coures-information', compact('courses'));
    }
    public function approve_course(Course $course, $type)
    {
        if($type == 'approve'){
            $course->update(['is_published'=> 1]);
            $msg = "Course Approved";

        }else if($type == 'inapprove'){
            $course->update(['is_published'=> 0]);
            $msg = "Course Rejected";
        }
        return redirect()->back()->with([
            'message' => $msg
        ]);
    }

    public function show(Course $course):View
    {
        $course = Course::with('courseChapters', 'courseLessons', 'trainer')->where('id', $course->id)->first();
        $anotherCourse = Course::whereNot('id', $course->id)->where('trainer_id', $course->trainer_id)->get();
        // dd($anotherCourse);
        return view(self::PATH . 'single-course', compact('course', 'anotherCourse'));
    }

    // Course Create
    public function create_course_page(){
        $trainers = Trainer::get();
        return view(self::PATH . 'course-add', compact('trainers'));
    }
    public function create_course_store(Request $request){
       
        // dd($request->all());
        return "okk";
    }
    //course enrolements
    public function get_enrolements():View
    {
        $enrolements = CourseEnrolement::with( 'course', 'student')->get();
       
        return view(self::PATH . 'course-enrolements', compact('enrolements'));
    }

    public function approve_enrolement(Request $request)
    {
        // $student_id = $request->student_id;
        CourseEnrolement::where('student_id', $request->student_id)->where('course_id', $request->course_id)->update(['tsp_approval'=> $request->status]);
      
        return response()->json(['msg'=>'successfully changed']);
    }
}
