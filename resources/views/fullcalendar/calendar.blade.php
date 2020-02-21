<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8' />

    
    <script src="~/scripts/fullcalendar/core/main.js"></script>
    <script src="~/scripts/fullcalendar/daygrid/main.js"></script>
    <script src="~/scripts/jquery-3.4.1.js"></script>
    <script scr ="~/scripts/moment.js"></script>
    <script scr ="js/calendar.js"></script>

    <script scr ="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
    <link href ="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet"/>
    <link href ="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.print.min.css" rel="stylesheet" media="print"/>


    {{-- <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
          plugins: [ 'dayGrid' ]
        });

        calendar.render();
      });

    </script> --}}
  </head>
  <body>

    <div id='calendar'></div>

  </body>
</html>

