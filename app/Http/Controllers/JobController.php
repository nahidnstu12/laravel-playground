<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\services\JobService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class JobController extends Controller
{
    const VIEW_PATH = 'backend.employer.job.';
    protected JobService $jobService;

    public function __construct(JobService $jobService)
    {
        $this->jobService = $jobService;
        $this->authorizeResource(Job::class);
    }

    public function index():View
    {
        return view(self::VIEW_PATH . 'index');
    }

    public function create():View
    {
        return \view(self::VIEW_PATH . 'edit-add');
    }

    public function store(Request $request):RedirectResponse
    {
        $jobInfo = $request->all();
        $jobValidation = $this->jobService->validator($jobInfo)
            ->validate();
        DB::beginTransaction();
        try {
            $job = $this->jobService->createJob($jobValidation);
            DB::commit();
        }catch (\Throwable $exception){
            DB::rollBack();
            Log::debug($exception->getMessage());
            return back()->with([
                'message'=>__('Wrong Data'),
                'alert-type'=> 'error'
            ]);
        }
        return redirect()->route('admin.employers.jobs.index')
            ->with(['message'=> __('Successfully Update'),
                'alert-type'=> 'Success']);
    }

    public function show(Job $job)
    {
        return \view(self::VIEW_PATH . 'read');

    }

    public function edit(Job $job):view
    {
        return \view(self::VIEW_PATH . 'edit-add',
            compact('job'));
    }

    public function update(Job $job, Request $request):RedirectResponse
    {
        $jobInfo = $request->all();
        $jobValidation = $this->jobService->validator($jobInfo)
            ->validate();
        DB::beginTransaction();
        try {
            $job = $this->jobService->updateJob($job,$jobValidation);
            DB::commit();
        }catch (\Throwable $exception){
            DB::rollBack();
            Log::debug($exception->getMessage());
            return back()->with([
                'message'=>__('Wrong Data'),
                'alert-type'=> 'error'
            ]);
        }
        return redirect()->route('admin.employers.jobs.index')
            ->with(['message'=> __('Successfully Update'),
                'alert-type'=> 'Success']);

    }

    public function destroy(Job $job):RedirectResponse
    {
        try {
            $this->jobService->deleteJob($job);
        }catch (\Throwable $exception){
            Log::debug($exception->getMessage());
            return back()->with([
                'message'=>__('Something went wrong'),
                'alert-type'=> 'error'
            ]);
        }
        return back()->with([
            'message'=>__('Deleted Successfully'),
            'alert-type'=> 'success'
        ]);
    }

    public function jobStatus(Request $request):JsonResponse
    {
        if($request->job_id && $request->status){
            $job = Job::findOrFail($request->job_id);
            if($request->status == Job::JOB_STATUS['archived']){
                $job->job_status = Job::JOB_STATUS['archived'];
                $message = __('Job Archievd Successfully', ['object'=>'job']);
            }
            else  if($request->status == Job::JOB_STATUS['published']){
                $job->job_status = Job::JOB_STATUS['published'];
                $message = __('Job published Successfully', ['object'=>'job']);
            }
            else if($request->status == Job::JOB_STATUS['expired']){
                $job->job_status = Job::JOB_STATUS['expired'];
                $message = __('Job expired Successfully', ['object'=>'job']);
            }else if($request->status == Job::JOB_STATUS['draft']){
                $job->job_status = Job::JOB_STATUS['draft'];
                $message = __('Job draft Successfully', ['object'=>'job']);
            }
            $job->save();
            return  response()->json(array('message'=> $message) , 200);
        }
        return response()->json(array('message'=> 'nothing found'),404);

    }
}
