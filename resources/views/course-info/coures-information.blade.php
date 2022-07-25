@extends('layout.app')

@include('layout.course-nav')

@section('content')
<div class="container my-5">
    <h1 class="text-primary mb-5">Course Information</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Course Title</th>
            <th scope="col">Course Duration</th>
            <th scope="col">Trainer Name</th>
            <th scope="col">Enroled Student</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($courses as $key =>$course)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{ Str::title($course->course_title) }}</td>
                <td class="text-center">{{ $course->course_duration }}</td>
                <td>{{ Str::title($course->trainer->name) }}</td>
                <td class="text-center">{{ $course->students->count() }}</td>
                <td>
                    <a class="btn btn-outline-primary" href={{route('course.show.single', $course->id) }}>View</a>
                    {{-- @if($course->is_published == 0) --}}
                    <a href="{{$course->is_published == 0 ? route('approve.course', ['course'=> $course->id, 'type'=> 'approve']) : route('approve.course', ['course'=> $course->id, 'type'=> 'inapprove'])}}" class="btn {{$course->is_published == 0 ? 'btn-outline-success' : 'btn-outline-warning'}}" role="button">{{ $course->is_published == 0 ? "Activate" : "Inactivate"}}</a>
                   
                </td>
            </tr>
        @empty
            <h1>No Course Information Available</h1>
        @endforelse


        </tbody>
    </table>
</div>
@endsection
