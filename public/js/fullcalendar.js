document.addEventListener('DOMContentLoaded', function() {
    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendarInteraction.Draggable

    /* initialize the external events
    -----------------------------------------------------------------*/

    // var containerEl = document.getElementById('external-events-list');
    // new Draggable(containerEl, {
    //     itemSelector: '.fc-event',
    // });

    //// the individual way to do it
    // var containerEl = document.getElementById('external-events-list');
    // var eventEls = Array.prototype.slice.call(
    //   containerEl.querySelectorAll('.fc-event')
    // );
    // eventEls.forEach(function(eventEl) {
    //   new Draggable(eventEl, {
    //     eventData: {
    //       title: eventEl.innerText.trim(),
    //     }
    //   });
    // });

    /* initialize the calendar
    -----------------------------------------------------------------*/

    var calendarEl = document.getElementById('calendar');
    var calendar = new Calendar(calendarEl, {
      plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
      },
      
      navLinks: true,
      eventLimit: true,
      selectable: true,
      editable: true,
      droppable: true, // this allows things to be dropped onto the calendar
      
      drop: function(element) {
        
        let Event = JSON.parse(element.draggedEl.dataset.event);

        if (document.getElementById('drop-remove').checked) {
          // if so, remove the element from the "Draggable Events" list
          element.draggedEl.parentNode.removeChild(element.draggedEl);

          Event._method = "DELETE";
          sendEvent(routeEvents('routeFastEventDelete'), Event);
        }
        
        let start = moment('${element.dateStr} ${Event.start}').format("YYYY-MM-DD HH:mm:ss");
        let end = moment('${element.dateStr} ${Event.end}').format("YYYY-MM-DD HH:mm:ss");

         Event.start = start;
         Event.end = end;        

         delete Event.id;
         delete Event._method;

         sendEvent(routeEvents('routeStoreEvent'), Event);

      },

      eventDrop: function(element){
         
          let start = moment(element.event.start).format("YYYY-MM-DD HH:mm:ss");
          let end = moment(element.event.end).format("YYYY-MM-DD HH:mm:ss");

          let newEvent = {
            _method: 'PUT',
            title: element.event.title,
            id: element.event.id,  
            start: start,
            end: end
          };

          sendEvent(routeEvents('routeUpdateEvent'), newEvent, calendar);          
      },     

      eventClick: function(element){

        clearMessages('#message');
        resetForm('#formEvent');

            $("#modalCalendar").modal('show');
            $("#modalCalendar #titleModal").text('Alter Appointment');
            $("#modalCalendar button.deleteEvent").css("display", "flex");

            let id = element.event.id;
            $("#modalCalendar input[name='id']").val(id);

            let title = element.event.title;
            $("#modalCalendar input[name='title']").val(title);

            

            let start = moment(element.event.start).format("DD/MM/YYYY HH:mm:ss");
            $("#modalCalendar input[name='start']").val(start);

            let end = moment(element.event.end).format("DD/MM/YYYY HH:mm:ss");
            $("#modalCalendar input[name='end']").val(end);

            let color = element.event.backgroundColor;
            $("#modalCalendar input[name='color']").val(color);

            let description = element.event.extendedProps.description;
            $("#modalCalendar textarea[name='description']").val(description);
      },

      eventResize: function(element){
          
          let start = moment(element.event.start).format("YYYY-MM-DD HH:mm:ss");
          let end = moment(element.event.end).format("YYYY-MM-DD HH:mm:ss");

          let newEvent = {
            _method: 'PUT',
            title: element.event.title,
            id: element.event.id,
            start: start,
            end: end
          };

          sendEvent(routeEvents('routeUpdateEvent'), newEvent);
      },

      select: function(element){
        
        clearMessages('#message');
        resetForm('#formEvent');

            $("#modalCalendar").modal('show');
            $("#modalCalendar #titleModal").text('Add Appointment');
            $("#modalCalendar button.deleteEvent").css("display", "none");            

            let start = moment(element.start).format("DD/MM/YYYY HH:mm:ss");
            $("#modalCalendar input[name='start']").val(start);

            let end = moment(element.end).format("DD/MM/YYYY HH:mm:ss");
            $("#modalCalendar input[name='end']").val(end);
            
            $("#modalCalendar input[name='color']").val("#3788D8");

             calendar.unselect()
      },

      eventReceive: function(element){
        element.event.remove();        
      },

      events: routeEvents('routeLoadEvents'),     
    });

    function routeEvents(route){
      return document.getElementById('calendar').dataset[route];
  }

  function sendEvent(route, data_) {

    $.ajax({
        url:route,
        data:data_,
        method:'GET',
        dataType: 'json',
        success:function (json){
            if(json){
                objCalendar.refetchEvents();
                $("#modalCalendar").modal('hide');
            }

            if(showModalUpdateFastEvent === true){
                showModalUpdateFastEvent = false;
                $("#modalFastEvent").modal('hide');

                let stringJson = `{"id":"${data_.id}","title":"${data_.title}","color":"${data_.color}","start":"${data_.start}","end":"${data_.end}", "date":"${data_.date}"}`;

                $(`#boxFastEvent${data_.id}`).attr('data-event', stringJson);
                $(`#boxFastEvent${data_.id}`).text(data_.title);
                $(`#boxFastEvent${data_.id}`).css({
                    "backgroundColor": `${data_.color}`,
                    "border": `1px solid ${data_.color}`});

        }
        if(showModalCreateFastEvent === true){
            showModalCreateFastEvent = false;
            $("#modalFastEvent").modal('hide');

            let stringJson = `{"id":"${json.created}","title":"${data_.title}","color":"${data_.color}","start":"${data_.start}","end":"${data_.end}"}`;

            let newEvent = `<div id="boxFastEvent${json.created}"
                    style="padding: 4px; border: 1px solid ${data_.color}; background-color: ${data_.color}"
                    class='fc-event event text-center'
                    data-event='${stringJson}'>
                    ${data_.title}
                </div>`;
            $('#external-events-list').append(newEvent);

        }
    },
    error:function (json) {

        let responseJSON = json.responseJSON.msg;

        $("#message").html(loadErrors(responseJSON));

        Console.log($("#message"));
    }

    });
}

function loadErrors(response) {

  let boxAlert = `<div class="alert alert-danger">`;

  for (let fields in response){
      boxAlert += `<span>${response[fields]}</span><br/>`;
  }

  boxAlert += `</div>`;

  return boxAlert.replace(/\,/g,"<br/>");
}

function clearMessages(element){
  $(element).text('');
}

function resetForm(form) {
  $(form)[0].reset();
}

    objCalendar = calendar;
    calendar.render();
    
  });


