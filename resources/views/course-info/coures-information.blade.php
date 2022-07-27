@extends('layout.app')

@include('layout.course-nav')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between">
        <h1 class="text-primary mb-5">Course Information</h1>
        <button class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal" style="align-self: center">Add Course</button>
    </div>
  
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
{{-- course modal --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
@endsection
