<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Trainer;
use App\services\CourseService;
use App\services\TSPService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class CourseController extends Controller
{
    public CourseService $courseService;
    public  TSPService $tspService;

    public function __construct(CourseService $courseService, TSPService $tspService){
        $this->courseService = $courseService;
        $this->tspService = $tspService;
        $this->startTime = Carbon::now();
    }
    public function index(){
        $course = Course::with(['trainer.user', 'skills'])->paginate();
        $locale = app()->getLocale()=='ar'? '' : "_en";

        return view('Course.index', compact('course', 'locale'));
    }
    public function store(Request $request){
        DB::beginTransaction();
        try {
            if(!$request->has('cover_image')){
                throw new \Exception("image not found.");
            }
            $request['course_cover_image'] = $request->file('cover_image')->store("store/upload/image/course");
            $validateData = $this->courseService->validator($request->all())->validate();
            $validateData['created_by'] = auth()->id();
            $validateData['trainer_id'] = Trainer::where('user_id', auth()
                ->id())
                ->first()
                ->id();
            $course = $this->courseService->store($validateData);
            $course->skills()
                ->sync(explode(",", $request->skill_id));

            DB::commit();
        }catch (\Throwable $exception){
            DB::rollBack();
            if($request->has('course_cover_image')){
                Storage::disk('public')->delete($request['course_cover_image']);
            }

            Log::debug($exception->getMessage());

            return redirect()->back()
                ->withInput()
                ->withErrors(['message'=> ['creation Failed', $exception->getMessage()]]);

        }
        Session::flash('message', 'course crated');
        return  redirect()->back();
    }

}
