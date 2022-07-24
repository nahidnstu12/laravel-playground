<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseEnrolement;
use App\Models\Student;
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
        $course = Course::with('courseChapters')->get()->dd();
        return view(self::PATH . 'single-course');
    }

    //course enrolements
    public function get_enrolements():View
    {
        $students = CourseEnrolement::with( 'course', 'student')->get();
        $courses = Course::with('trainer')->get();
        return view(self::PATH . 'course-enrolements', compact('students'));
    }

    public function approve_enrolement(Student $student, $type)
    {

    }
}
