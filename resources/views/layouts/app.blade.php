<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- SEO Meta Tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Webpage Title -->
    <title>ADHDCheck</title>

    @include('includes.style')
</head>

<body>
    @include('sweetalert::alert')

    @include('includes.navbar')

    <main>
        @yield('content')
    </main>

    @include('includes.footer')

    <!-- Back To Top Button -->
    <button onclick="topFunction()" id="myBtn">
        <img src="{{ asset('assets/img/up-arrow.png') }}" alt="alternative">
    </button>

    <!-- Scripts -->
    @include('includes.script')
</body>

</html>
