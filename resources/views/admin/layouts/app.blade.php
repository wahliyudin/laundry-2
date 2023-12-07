<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>{{ config('app.name') }} - DataTables</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/admin/img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('assets/admin/img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('assets/admin/img/favicon/favicon-16x16.png') }}">
    <link type="text/css" href="{{ asset('assets/admin/css/volt.css') }}" rel="stylesheet">
    @stack('css')
</head>

<body>
    @include('admin.layouts.component.navbar-phone')
    @include('admin.layouts.component.sidebar')
    <main class="content pb-4">
        @include('admin.layouts.component.navbar')
        <div class="py-4">
            @yield('breadcrumb')
        </div>
        @yield('content')
    </main>
    @stack('modal')
    <script src="{{ asset('assets/admin/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/onscreen/dist/on-screen.umd.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/app.js') }}"></script>
    @stack('js')
</body>

</html>
