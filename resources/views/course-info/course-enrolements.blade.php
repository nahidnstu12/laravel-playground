@extends('layout.app')

@section('content')
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
        @forelse($students as $key=>$student)
        <tr>
            <th scope="row">{{ $key+1 }}</th>
            <td class="text-center">{{ $student->course->course_title }}</td>
            <td class="text-center">{{ $student->student->name }}</td>
            <td class="text-center">{{ Carbon\Carbon::parse($student->enrolment_date)->diffForHumans() }}</td>
            <td class="text-center">{{ $student->course->trainer->name }}</td>
            <td>
                <select class="form-control" id="exampleSelect">

                    @foreach(\App\Models\CourseEnrolement::enrolementStatus() as $key => $value)
                        <option value="{{ $key }}" {{ $key == $student->tsp_approval ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach

                </select>
            </td>
        </tr>
        @empty
            <h1>No Course Enrolement Information Available</h1>
        @endforelse

        </tbody>
    </table>
@endsection
