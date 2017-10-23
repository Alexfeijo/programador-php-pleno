<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Sistema de matrículas</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap-4.0.0/css/bootstrap.min.css') }}">
        
    </head>
    <body>
        <div>
            <div class="container-fluid">
                <nav class="row navbar navbar-expand-lg navbar-light bg-light">
                  <a class="navbar-brand h1" href="#">Sistema de matrículas</a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route("courses.index") }}">Cursos</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route("students.index") }}">Alunos</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route("registrations.index") }}">Matrículas</a>
                      </li>
                    </ul>
                  </div>
                </nav>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-10 ml-auto mr-auto mt-5">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.0.4/popper.js"></script>
    <script src="{{ asset('vendor/bootstrap-4.0.0/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    
    @yield('scripts')
</html>
