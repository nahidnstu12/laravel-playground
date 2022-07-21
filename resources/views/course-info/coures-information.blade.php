@extends('layout.app')

@section('content')
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
                <td>{{ $course->course_title }}</td>
                <td>{{ $course->course_duration }}</td>
                <td>{{ Str::title($course->trainer->name) }}</td>
                <td>{{ "count student" }}</td>
                <td>
                    <button class="btn btn-outline-primary">Edit</button>
                    <button class="btn btn-outline-success">Active</button>
                </td>
            </tr>
        @empty
            <h1>No Course Information Available</h1>
        @endforelse


        </tbody>
    </table>
@endsection
