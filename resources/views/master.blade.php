
<!DOCTYPE html>
<html lang="ua">
<head>
    <meta name="csrf-token" content="<?= csrf_token() ?>" />
    <meta name="csrf-param" content="_token" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{--    <link rel="shortcut icon" href="{{ URL::asset('img/logo.png') }}" type="image/x-icon">--}}
    <title>{{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

</head>
<body>

{{-- Error hadling --}}
@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert-danger alert">
            {{$error}}
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@elseif(session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif
{{----}}


<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="">
        <i class="fas fa-users-cog"> Email-Marketing</i>
        <p class="fs-6 text-muted">Dashboard
        </p>
    </a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-nav">
        <div class="nav-item text-nowrap">

        </div>
    </div>
</header>

<div class="container-fluid">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('customer.index') }}">
                            <i class="fas fa-user-shield"></i>
                            Customers
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('group.index') }}">
                            <i class="fas fa-user-shield"></i>
                            Groups
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('mail.index') }}">
                            <i class="fas fa-user-shield"></i>
                            Mail Templates
                        </a>
                    </li>

                </ul>
            </div>
        </nav>
    </div>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
    <div>
        @yield('content')
    </div>

</main>

<script src="https://code.jquery.com/jquery-3.4.0.min.js"
        integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
        crossorigin="anonymous"></script>
<script src="{{ URL::asset('rails.js') }}"></script>

</body>
</html>
