<?php

namespace App\Http\Controllers;

use App\Models\Course;
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
    public function show():View
    {
        return view(self::PATH . 'single-course');
    }

    //course enrolements
    public function get_enrolements():View
    {
        return view(self::PATH . 'course-enrolements');
    }
}
