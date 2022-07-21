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
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>23</td>
            <td>@mdo</td>
            <td>23</td>
            <td>
                <button class="btn btn-outline-primary">Edit</button>
                <button class="btn btn-outline-success">Active</button>
            </td>
        </tr>

        </tbody>
    </table>
@endsection
