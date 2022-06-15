<?php

namespace App\services;

use App\Helpers\Classes\AuthHelper;
use App\Models\BaseModel;
use App\Models\Job;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class JobService
{
    public function validator(array $data):\Illuminate\Contracts\Validation\Validator
    {
        $rules = [
            'employer_id' => [
                'required',
                'int'
            ],
            'category' => [
                'required',
                'int'
            ],
            'circular_title' => [
                'required',
            ],
            'job_title' => [
                'required',
            ],
            'vacancy_no' => [
                'required',
                'int'
            ],
            'salary_min' => [
                'nullable',
            ],
            'salary_max' => [
                'nullable',
            ]

        ];
        return  Validator::make($data, $rules);
    }

    public function createJob(array $data):Job
    {
        $job = new Job();
        $job->fill($data);
        $job->save();
        return $job;
    }

    public function updateJob(Job $job, array $data):Job
    {
        $job->fill($data);
        $job->save();
        return $job;
    }

    public function getListDataForDatatable(Request $request):JsonResponse
    {
        $authUser = AuthHelper::getAuthUser();
        $jobs = Job::select([
            'id','cicular_title','job_title','vacncy_no','job_status'
        ]);
        $jobs->where(['employer_id'=>$authUser->employer->id]);
        return  DataTables::eloquent($jobs)
            ->addIndexColumn()
            ->editColumn('job_status', function (Job $job){
                $str = '';
                if($job->job_status == Job::JOB_STATUS['published']){
                    $str .= '<a href="#" class="badge badge-status">
                    <i class="fas fa-thermometer-three-quarters"></i>'
                        .__('published') .
                        '</a>' ;
                }
                else if($job->job_status == Job::JOB_STATUS['expired']){
                    $str .= '<a href="#" class="badge badge-danger">
                    <i class="fas fa-thermometer-three-quarters"></i>'
                        .__('Archieved') .
                        '</a>' ;
                }
                else{
                    $str .= '<a href="#" class="badge badge-primary">
                                <i class="fas fa-thermometer-three-quarters"></i> '
                                 . __('Draft') . '</a>';
                }
                return $str;

            })->addColumn('action', function (Job $job){
                $str = "";
                $str .= '<a href="'.route('admin.employers.job.show',$job)
                    . '" class="btn btn-outline-info btn-sm">
                    <i class="fas fa-eye"></i>'
                    .__('generic.view') . '</a>';
                $str .= '<a href="' . route('admin.employers.jobs.edit', $job) .
                    '" class="btn btn-outline-warning btn-sm">
                       <i class="fas fa-edit"></i> ' . __('generic.edit_button_label') .
                    '</a>';
                $str .= '<a href="#" data-action="' . route('admin.employers.jobs.destroy',$job) .
                    '" class="btn btn-outline-danger btn-sm delete">
                        <i class="fas fa-trash"></i> '
                    . __('generic.delete_button_label') .
                    '</a>';
                $str .= '<select class="form-control  btn-sm btn-outline-dark job_status" id="job_status" name ="job_status" data-action="'
                .$job->id. '"data-toggle="modal" data-target="#jobStatus">';
                $str .= '<option value="">Select Job Status</option>';
                $str .= '<option value="1" >Draft</option>';
                $str .= '<option value="2" >Publish</option>';
                $str .= '<option value="3" >Expire</option>';
                $str .= '<option value="4" >Archive</option>';

                return $str;

            })->rawColumns(['job_status', 'action'])
            ->toJson();

    }

    public function deleteJob(Job $job):bool
    {
        $job->row_status = BaseModel::ROW_STATUS_DELETED;
        return $job->save();
    }
}
