<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" class="light" data-header-styles="light"
    data-menu-styles="dark" data-vertical-style="overlay" toggled="icon-overlay-close">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Leebaron')</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="shortcut icon" href="" />

    <!-- Main JS -->
    <script src="{{ asset('admin/js/main.js') }}"></script>

    <!-- Style Css -->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/css/custom-css.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/js/libs/tabulator-tables/css/tabulator.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.6/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.6/dist/sweetalert2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
    <link rel="stylesheet" href="{{ asset('admin/js/libs/flatpickr/flatpickr.min.css') }}">
</head>

<body>
