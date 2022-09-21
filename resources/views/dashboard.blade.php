@extends('layout.base')

@section('title','Dashboard')

@section('content')
<body class="hold-transition  sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        @include('layout.preloader')
        <!-- Navbar -->
        @include('layout.navbar')
        @include('layout.sidebar')
        @yield('section')
        @include('layout.footer')
    </div>
</body>
@endsection