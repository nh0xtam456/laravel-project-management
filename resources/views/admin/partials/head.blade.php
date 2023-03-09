<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>@yield('module', 'Dashboard') | @yield('action')</title>

<!-- Google Font: Source Sans Pro -->
<link
  rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
/>
<!-- Font Awesome -->
<link
  rel="stylesheet"
  href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}"
/>

<link rel="stylesheet" href="{{ asset('admin/plugins/fullcalendar/main.css') }}">

<link rel="stylesheet" href="{{ asset('admin/css/adminlte.min.css?v=3.2.0') }}">
<script src="{{ asset('admin/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('admin/css/adminlte.min.css') }}" />

<script src="{{ asset('admin/plugins/ckeditor/ckeditor.js') }}"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">