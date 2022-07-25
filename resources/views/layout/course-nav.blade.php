<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Laravel Playground</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-5">
        <li class="nav-item">
          <a class="nav-link text-white font-weight-bold" href="{{ route('course.show.table')}}">Course Information</a>
        </li>
        <li class="nav-item text-white font-weight-bold">
            <a class="nav-link" href="{{ route('enrolements.show.table')}}">Enrolement Information</a>
          </li>
       
      </ul>
    </div>
  </nav>