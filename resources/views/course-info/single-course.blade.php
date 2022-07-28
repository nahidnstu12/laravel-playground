@extends('layout.app')


@section('content')
    @include('layout.course-nav')
    <div class="container my-5">
        <h1 class="text-primary mb-5">{{ $course->course_title }}</h1>
        <p>{{ $course->courseChapters->count() }} chapters | {{ $course->courseLessons->count() }} lessons |
            {{ $course->course_duration }} hours</p>
        <p>{{ Str::title($course->trainer->name) }}</p>


        <div class="accordion" id="accordionExample">
            @forelse ($course->courseChapters as $courseChapter)
                <div class="card">
                    <div class="card-header" id="heading{{ $courseChapter->id }}">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                data-target="#collapse{{ $courseChapter->id }}" aria-expanded="true"
                                aria-controls="collapse{{ $courseChapter->id }}">
                                {{ $courseChapter->chapter_title }}
                            </button>
                        </h2>
                    </div>

                    <div id="collapse{{ $courseChapter->id }}" class="collapse"
                        aria-labelledby="heading{{ $courseChapter->id }}" data-parent="#accordionExample">
                        <div class="card-body">

                            <ul class="list-group">
                                @forelse ($courseChapter->courseLessons as $lessons)
                                    <li class="list-group-item">{{ $lessons->lesson_title }}</li>
                                @empty
                                    <h4>Module Coming</h4>
                            </ul>
            @endforelse
        </div>
    </div>
    </div>
@empty
    <h1>No Chapter Added</h1>
    @endforelse
    </div>



    <div class="mt-5">
        <h5 class="my-3">{{ Str::title($course->trainer->name) }} Another Course</h5>
        <div class="d-flex">
            @forelse ($anotherCourse as $course)
                <div class="card mr-3" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $course->course_title }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $course->course_duration }} Hours</h6>
                        <p class="card-text">
                            {{ $course->course_description ??
                                "Some quick example text to build on the card title and make up the bulk of the card's
                                          content." }}
                        </p>
                        <a href="{{ route('course.show.single', $course->id) }}" class="card-link">View Course</a>

                    </div>
                </div>

            @empty
            @endforelse
        </div>
    </div>
    </div>

@endsection


