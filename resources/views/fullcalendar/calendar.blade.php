
@extends('fullcalendar.master')
@section('content')

    @include('fullcalendar.modals.modal-events')
    @include('fullcalendar.modals.modal-fastEvents')

    <div id='external-events'>
        <h4>Fast Event</h4>

        <div id='external-events-list'>

            @isset($fastEvents)
                @forelse($fastEvents as $fastEvent)
                    <div id="boxFastEvent{{ $fastEvent->id }}"
                        style="padding: 4px; border: 1px solid {{ $fastEvent->color }}; background-color: {{ $fastEvent->color }}"
                        class='fc-event event text-center'
                        data-event='{"id":"{{ $fastEvent->id }}","title":"{{ $fastEvent->title }}","color":"{{ $fastEvent->color }}","start":"{{ $fastEvent->start }}","end":"{{ $fastEvent->end }}"}'>
                        {{ $fastEvent->title }}
                    </div>
                @empty
                    <p>There are no quick events to show.</p>
                @endforelse
            @endisset

        </div>

        <p>
            <input type='checkbox' id='drop-remove'/>
            <label for='drop-remove'>Remove after dragging.</label>
            <button class="btn btn-sm btn-success" id="newFastEvent" style="font-size: 1em; width: 100%;">Create New Event</button>
        </p>
    </div>


    <div id='calendar'
        data-route-load-events="{{ route('routeLoadEvents') }}"
        data-route-event-update="{{ route('routeUpdateEvent') }}"
        data-route-event-store="{{ route('routeStoreEvent') }}"
        data-route-event-delete="{{ route('routeDestroyEvent') }}"

        data-route-fast-event-delete="{{ route('routeFastEventDelete') }}"
        data-route-fast-event-update="{{ route('routeFastEventUpdate') }}"
        data-route-fast-event-store="{{ route('routeFastEventStore') }}">
    </div>

@endsection
=======
<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8' />

    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script scr ="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
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


