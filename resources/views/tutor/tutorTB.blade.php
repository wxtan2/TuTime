@extends('layout.nav')

@section('content')

    <script>
        document.addEventListener('DOMContentLoaded', function() {


            var Calendar = FullCalendar.Calendar;


            var Draggable = FullCalendar.Draggable;

            var containerEl = document.getElementById('external-events');
            var calendarEl = document.getElementById('calendar');
            var checkbox = document.getElementById('drop-remove');

            // initialize the external events
            // -----------------------------------------------------------------

            // $('#external-events .fc-event').each(function() {

            //     store data so the calendar knows to render an event upon drop
            //     $(this).data('event', {
            //         title: $.trim($(this).text()), // use the element's text as the event title
            //         stick: true // maintain when user navigates (see docs on the renderEvent method)
            //     });

            //     // make the event draggable using jQuery UI
            //     $(this).draggable({
            //         zIndex: 999,
            //         revert: true, // will cause the event to go back to its
            //         revertDuration: 0 //  original position after the drag
            //     });

            // });

            new Draggable(containerEl, {
                itemSelector: '.fc-event',
                eventData: function(eventEl) {
                    return {
                        title: eventEl.innerText
                    };
                }
            });

            {!!$events = DB::table('events')->get();$userEmail !!}

            var calendar = new FullCalendar.Calendar(calendarEl, {

                initialView: 'timeGridWeek',
                editable: true,
                droppable: true,
                drop: function(info) {
                    // is the "remove after drop" checkbox checked?
                    if (checkbox.checked) {
                        // if so, remove the element from the "Draggable Events" list
                        info.draggedEl.parentNode.removeChild(info.draggedEl);
                    }
                },

                // eventDragStop: function(event, jsEvent, ui, view) {

                //     if (isEventOverDiv(jsEvent.clientX, jsEvent.clientY)) {
                //         calendar.fullCalendar('removeEvents', event._id);
                //         var el = $("<div class='fc-event'>").appendTo('#external-events-listing').text(event.title);
                //         el.draggable({
                //             zIndex: 999,
                //             revertDuration: 0
                //         });
                //         el.data('event', {
                //             title: event.title,
                //             id: event.id,
                //             stick: true
                //         });
                //     }
                // },

                events: [

                    @foreach ($events as $event)
                        {
                        id : '{!! $event->id !!}',
                        title : "{!! $event->title !!}",
                        daysOfWeek: ['{!! $event->dayOfWeek !!}'],
                        startTime: "{!! $event->startTime !!}",
                        endTime: "{!! $event->endTime !!}",
                        backgroundColor : '{{ $event->backgroundColor }}',
                        borderColor: '{{ $event->backgroundColor }}',
                        ajax : true,
                        },
                    @endforeach

                    //this object will be "parsed" into an Event Object
                    // title: 'The Title', // a property!
                    // daysOfWeek: ['0'],
                    // startTime: '10:00:00',
                    // endTime: '12:00:00',
                    // backgroundColor: '#dc7543',
                    // borderColor: '#dc7543',
                    // ajax: true,
                    
                ],

                dayClick: function(date, jsEvent, view) {
                    //Change background color of day when it is clicked
                    $(this).css('background-color', '#bed7f3');
                    //Get the date that was clicked
                    var date_clicked = date.format();
                    //Redirect to the new event entry form
                    window.location.href = "{{ URL::to('events') }}" + "/" + date_clicked;
                },

                eventClick: function(event, jsEvent, view) {
                    $(this).css('background-color', '#ff0000');
                },

                eventDragStart: function(event, jsEvent, view) {
                    $(this).css('background-color', '#dc7543');
                },


            });

            calendar.render();

            // var isEventOverDiv = function(x, y) {

            //     var external_events = $('#external-events');
            //     var offset = external_events.offset();
            //     offset.right = external_events.width() + offset.left;
            //     offset.bottom = external_events.height() + offset.top;

            //     // Compare
            //     if (x >= offset.left &&
            //         y >= offset.top &&
            //         x <= offset.right &&
            //         y <= offset.bottom) {
            //         return true;
            //     }
            //     return false;

            // }

        });
    </script>



    <div style="width:calc(80% - 13.54vw); 
                    height: 91vh; 
                    margin-top:65px; 
                    margin-left: calc(13.54vw + 15px); 
                    display:flex;
                    float:left;
                    color:#666666!important; 
                    box-sizing: border-box;
                    padding:10px;
                    background:#ffffff;
                    box-shadow: 0px 4px 35px rgba(154, 161, 171, 0.15);
                    border-radius:10px;">
        <div id='calendar' style="height:100%; width:100%"></div>
    </div>
    {{-- <div id="external-events"
        style="   height: 91vh;
                                                        margin-top: 65px;
                                                        float: right;
                                                        background-color: #ffffff;
                                                        border-radius:10px;
                                                        width: calc(18.5% - 25px);
                                                        margin-right: 24px;
                                                        box-shadow: 0px 4px 35px rgba(154, 161, 171, 0.15);padding:24px;color:#000000;box-sizing:border-box">
        <strong>Draggable Events</strong>

        <div class="fc-event-drop">
            <div class="fc-event-main">My Event 1</div>
        </div>
        <div class="fc-event-drop">
            <div class="fc-event-main">My Event 2</div>
        </div>
        <div class="fc-event-drop ">
            <div class="fc-event-main">My Event 3</div>
        </div>
        <div class="fc-event-drop">
            <div class="fc-event-main">My Event 4</div>
        </div>
        <div class="fc-event-drop">
            <div class="fc-event-main">My Event 5</div>
        </div>

        <p>
            <input type="checkbox" id="drop-remove">
            <label for="drop-remove">remove after drop</label>
        </p>
    </div> --}}

    <div id='external-events'>
        <div id='external-events-listing'>
            <h4 style="color:#000000">Events</h4>
            <div class='fc-event fc-h-event'>My Event 1</div>
            <div class='fc-event fc-h-event'>My Event 2</div>
            <div class='fc-event fc-h-event'>My Event 3</div>
            <div class='fc-event fc-h-event'>My Event 4</div>
            <div class='fc-event fc-h-event'>My Event 5</div>
        </div>
        <p>
            <input type='checkbox' id='drop-remove' checked='checked' />
            <label for='drop-remove'>remove after drop</label>
        </p>
    </div>

    <div style='clear:both'></div>


    <style>
        #external-events {
            box-sizing: border-box;
            margin-right: 24px;
            margin-top: 65px;
            float: right;
            width: calc(18.5% - 25px);
            padding: 0 10px;
            text-align: left;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 4px 35px rgba(154, 161, 171, 0.15)
        }


        #external-events .fc-event,
        .fc-h-event {
            height: 20px;
            margin: 5px 0;
            padding: 10px;
            align-items: center;
            display: flex;
            cursor: pointer;
            border-radius: 5px;
            border: 1px solid #dc7543;
            background: #dc7543 !important;
            text-align: left;
        }

        #external-events h4 {
            font-size: 16px;
            margin-top: 0;
            padding-top: 1em;
        }

        #external-events p {
            margin: 1.5em 0;
            font-size: 11px;
            color: #666;
        }

        #external-events p input {
            margin: 0;
            vertical-align: middle;
        }

        .fc .fc-button-primary {
            color: #fff;
            color: var(--fc-button-text-color, #fff);
            background-color: #dc7543;
            background-color: var(--fc-button-bg-color, #dc7543);
            border-color: #dc7543;
            border-color: var(--fc-button-border-color, #dc7543);
        }

        .fc .fc-button-primary:hover {
            color: #fff;
            color: var(--fc-button-text-color, #fff);
            background-color: #F28F3B;
            background-color: var(--fc-button-hover-bg-color, #F28F3B);
            border-color: #F28F3B;
            border-color: var(--fc-button-hover-border-color, #F28F3B);
        }

        .fc .fc-button-primary:disabled {
            color: #fff;
            color: var(--fc-button-text-color, #fff);
            background-color: #F28F3B;
            background-color: var(--fc-button-bg-color, #F28F3B);
            border-color: #F28F3B;
            border-color: var(--fc-button-border-color, #F28F3B);
        }

        .fc .fc-button-primary:not(:disabled).fc-button-active,
        .fc .fc-button-primary:not(:disabled):active {
            color: #fff;
            color: var(--fc-button-text-color, #fff);
            background-color: #F28F3B;
            background-color: var(--fc-button-active-bg-color, #F28F3B);
            border-color: #F28F3B;
            border-color: var(--fc-button-active-border-color, #F28F3B);
        }

    </style>
@endsection
