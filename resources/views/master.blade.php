
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

@yield('content')

<script src="https://code.jquery.com/jquery-3.4.0.min.js"
        integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
        crossorigin="anonymous"></script>
<script src="{{ URL::asset('rails.js') }}"></script>

</body>
</html>
