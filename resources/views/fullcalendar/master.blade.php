<!DOCTYPE html>
<html>
<head>

<meta charset='utf-8' />
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>Calendar</title>

<link href='{{asset('assets/packages/core/main.css')}}' rel='stylesheet' />
<link href='{{asset('assets/packages/daygrid/main.css')}}' rel='stylesheet' />
<link href='{{asset('assets/packages/timegrid/main.css')}}' rel='stylesheet' />
<link href='{{asset('assets/packages/list/main.css')}}' rel='stylesheet' />
<link href='{{ asset('css/stylefullcalendar.css')}}' rel='stylesheet' />
<link href='{{asset('css/bootstrap.css')}}' rel='stylesheet' />
<link href='{{ asset('css/fullcalendar.css')}}' rel='stylesheet' />
</head>

<body>

  <div id='wrap'>@yield('content')</div>

  <div style='clear:both'></div>

<script src='{{asset('assets/packages/core/main.js')}}'></script>
<script src='{{asset('assets/packages/interaction/main.js')}}'></script>
<script src='{{asset('assets/packages/daygrid/main.js')}}'></script>
<script src='{{asset('assets/packages/timegrid/main.js')}}'></script>
<script src='{{asset('assets/packages/list/main.js')}}'></script>

<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script> --}}
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<script src='{{asset('js/script.js')}}'></script>
<script src='{{asset('js/fullcalendar.js')}}'> type = 'module'</script>

</body>
</html>
