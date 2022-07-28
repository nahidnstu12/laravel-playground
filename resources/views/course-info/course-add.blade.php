@extends('layout.app')



@section('content')
    @include('layout.course-nav')
    <div class="container my-5">
        <div class="d-flex justify-content-between">
            <h1 class="text-primary mb-5">Course Create</h1>
            <a class="btn btn-outline-primary" href="{{ route('course.show.table') }}" style="align-self: center">Back</a>
        </div>
        <div class="form-container">
            <form action="" method="post">
                @csrf
                <div class="row">
                    <div class="col-6 mb-3">
                        <input type="text" class="form-control" placeholder="Course Name" name="course_name">
                    </div>
                    <div class="col-6 mb-3">
                        <select class="custom-select" name="trainer_name">
                            <option>Trainer Name</option>
                            @foreach ($trainers as $key => $trainer)
                                <option value="{{ $key }}" {{ $key == $trainer->id ? 'selected' : '' }}>
                                    {{ $trainer->name }}</option>
                            @endforeach

                        </select>

                    </div>
                    <div class="border border-primary col-12 py-3 d-flex flex-wrap" id="chapter-module"></div>

                    {{-- <div class="border border-primary col-12 py-3 d-flex flex-wrap" id="chapter-module">
                        <div class="col-6  mb-3">
                            <input type="text" class="form-control" placeholder="Chapter Name" name="chapter_name">
                        </div>
                        <div class="col-6  mb-3">
                            <button class="btn btn-outline-primary" id="add_lesson">Add Lessons</button>
                        </div>
                        <div class="border border-dark col-12 py-3 d-flex">
                            <div class="col-4  mb-3">
                                <input type="text" class="form-control" placeholder="Lesson Title" name="lesson_title">
                            </div>
                            <div class="col-4  mb-3">
                                <input type="number" class="form-control" placeholder="Lesson Duration" name="lesson_duration">
                            </div>
                            <div class="col-4  mb-3">
                                <button class="btn btn-outline-primary">Add Another Lessons</button>
                            </div>
                        </div>
                    </div> --}}

                    <div class="col-12 my-3">
                        <button class="btn btn-outline-primary" id="add_chapter">Add Chapter</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
    @push('js')
        <script>
            const chapterHtml = `
                        <div class="col-6  mb-3">
                            <input type="text" class="form-control" placeholder="Chapter Name" name="chapter_name">
                        </div>
                        <div class="col-6  mb-3">
                            <button class="btn btn-outline-primary add_lesson" id="add_lesson">Add Lessons</button>
                        </div>`
        
            const lessonHtml = `
                        <div class="border border-dark col-12 py-3 d-flex">
                            <div class="col-4  mb-3">
                                <input type="text" class="form-control" placeholder="Lesson Title" name="lesson_title">
                            </div>
                            <div class="col-4  mb-3">
                                <input type="number" class="form-control" placeholder="Lesson Duration" name="lesson_duration">
                            </div>
                            <div class="col-4  mb-3">
                                <button class="btn btn-outline-primary add_lesson">Add Another Lessons</button>
                            </div>
                        </div>`

            $(document).ready(function() {
                $("#add_chapter").click(function(e) {
                    e.preventDefault()
                    console.log("chapter click");
                    $(chapterHtml).prependTo("#chapter-module");

                })

                $(".add_lesson").click(function(e) {
                    e.preventDefault()
                    console.log("lesson click");
                    $(lessonHtml).prependTo(this);

                })
            })
        </script>
    @endpush
@endsection
