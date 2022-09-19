@extends('layout.base')
@section('title')
Dashboard
@endsection
@section('content')

<body class="hold-transition  sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        @include('layout.preloader')
        @yield('additional')
        <!-- Navbar -->
        @include('layout.navbar')
        @include('layout.sidebar')
        @include('layout.footer')
    </div>
</body>


@endsection