<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class CourseInfoController extends Controller
{
    const PATH = 'course-info.';
    public function get_courses():View
    {
        return view(self::PATH . 'coures-information');
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
