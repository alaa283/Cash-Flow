<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cash Flow</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}" />

    @yield('special-header')
</head>

<body>
    <!-- start of content -->
        <main>
            @yield('main-body')
        </main>
    <!-- end of content -->
    <script src="{{asset('assets/scripts/bootstrap1.js')}}"></script>
    @yield('special-end-page')
</body>




</html>
