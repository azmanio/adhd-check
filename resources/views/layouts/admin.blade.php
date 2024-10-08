<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keyword" content="Sistem,Pakar,Laravel,PHP,ADHD">
    <meta name="theme-color" content="#ffffff">

    <title>
        @yield('title', 'Admin') - ADHDCheck
    </title>

    @include('includes.admin.style')

</head>

<body>
    @include('sweetalert::alert')

    @include('includes.admin.sidebar')

    <div class="wrapper d-flex flex-column min-vh-100">
        <header class="header header-sticky p-0 mb-4">
            @include('includes.admin.navbar')
            @yield('breadcrumb')
        </header>

        <main class="body flex-grow-1">
            @yield('content')
        </main>

        @include('includes.admin.footer')
    </div>

    @include('includes.admin.script')
</body>

</html>
