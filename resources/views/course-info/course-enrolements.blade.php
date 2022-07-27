@extends('layout.app')

@section('content')
@include('layout.course-nav')
<div class="container my-5">
    <h1 class="text-primary mb-5">Course Enrolements Information</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col" class="text-center">Course Title</th>
            <th scope="col" class="text-center">Applicant Name</th>
            <th scope="col" class="text-center">Application Time</th>
            <th scope="col" class="text-center">Trainer Name</th>
            <th scope="col" class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($enrolements as $key=>$enrolements)
        <tr>
            <th scope="row">{{ $key+1 }}</th>
            <td class="text-center">{{  Str::title($enrolements->course->course_title) }}</td>
            <td class="text-center">{{  Str::title($enrolements->student->name) }}</td>
            <td class="text-center">{{ Carbon\Carbon::parse($enrolements->enrolment_date)->diffForHumans() }}</td>
            <td class="text-center">{{ Str::title($enrolements->course->trainer->name) }}</td>
            <td>
                <select class="form-control enrolement_status"  name="enrolement_status" data-id="{{ $enrolements->student_id}}" data-course-id="{{$enrolements->course_id}}">

                    @foreach(\App\Models\CourseEnrolement::enrolementStatus() as $key => $value)
                        <option value="{{ $key }}" {{ $key == $enrolements->tsp_approval ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach

                </select>
            </td>
        </tr>
        @empty
            <h1>No Course Enrolement Information Available</h1>
        @endforelse

        </tbody>
    </table>
</div>

   
@endsection

@push('js')
<script>
    $(document).ready(function(){
      
        $('.enrolement_status').change(function(){

            var id = $(this).val();
            var std = $(this).attr('data-id')
            var ctd = $(this).attr('data-course-id')

            console.log({id, std, ctd})
            $.ajax({
           url:"{{ route('approve.enrolement')}}",
           method: 'post',
           dataType: 'json',
           data:{ student_id:std, status: id, course_id: ctd},
           success: function(response){
                console.log(response)
           }
        })
           
        })
    })
</script>
    
@endpush