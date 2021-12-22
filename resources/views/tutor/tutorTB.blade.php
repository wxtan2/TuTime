@extends('layout.nav')

@section('content')

    {{-- @php
    $username = 'Guest';
    $userEmail = 'null';
    if (Auth::guard('students')->check()) {
        $username = Auth::guard('students')->user()->username;
        $userEmail = Auth::guard('students')->user()->email;
    } elseif (Auth::guard('web')->check()) {
        $username = Auth::guard('web')->user()->username;
        $userEmail = Auth::guard('web')->user()->email;
    }
    @endphp --}}

    <script>
        $(document).ready(function() {

            var SITEURL = "{{ url('/') }}";

            var getDayOfWeek = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
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




            // @php $events = DB::table('events')->get(); @endphp

            var calendar = new FullCalendar.Calendar(calendarEl, {

                initialView: 'timeGridWeek',
                editable: true,
                droppable: true,
                selectable: true,
                allDaySlot: false,
                events: SITEURL + "/fullcalender",

                // eventDidMount: function(info) {
                //     var tooltip = new Tooltip(info.el, {
                //         title: info.event.extendedProps.description,
                //         placement: 'top',
                //         trigger: 'hover',
                //         container: 'body'
                //     });
                //     info.el.style.borderRadius = '0px';
                //     info.el.style.borderWidth = '4px';
                // },
                eventContent: function(arg) {
                    // info.event.title
                    // info.event.extendedProps.description
                    '123asdf'
                },


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


                @php
                
                $events = DB::table('events')
                    ->whereNotNull('dayOfWeek')
                    ->where(function ($query) {
                        if (Auth::guard('students')->check()) {
                            $userCurrent = Auth::guard('students');
                        } elseif (Auth::guard('web')->check()) {
                            $userCurrent = Auth::guard('web');
                        }
                        $query->where('emailStudent', $userCurrent->user()->email)->orWhere('emailTutor', $userCurrent->user()->email);
                    })
                    ->get();
                
                if (Auth::guard('students')->check()) {
                    $userCurrent = Auth::guard('students');
                } elseif (Auth::guard('web')->check()) {
                    $userCurrent = Auth::guard('web');
                }
                
                $classes = DB::table('classes')
                    ->whereNotNull('dayOfWeek')
                    ->where('emailTutor', $userCurrent->user()->email)
                    ->get();
                @endphp



                events: [

                    @foreach ($events as $event)
                        {
                        id : '{!! $event->id !!}',
                        title : "{!! $event->title !!}",
                        description : "{!! $event->description !!}",
                        daysOfWeek: ['{!! $event->dayOfWeek !!}'],
                        startTime: "{!! $event->startTime !!}",
                        endTime: "{!! $event->endTime !!}",
                        backgroundColor : '{{ $event->backgroundColor }}',
                        borderColor: '{{ $event->backgroundColor }}',
                        eventType:'event',
                        ajax : true,
                        },
                    @endforeach

                    @if (Auth::guard('web')->check())
                        @foreach ($classes as $class)
                            {
                            id : '{!! $class->id !!}',
                            title : "{!! $class->className !!}",
                            description : "{!! $class->subject !!}",
                            daysOfWeek: ['{!! $class->dayOfWeek !!}'],
                            startTime: "{!! $class->startTime !!}",
                            endTime: "{!! $class->endTime !!}",
                            backgroundColor : '{{ $class->backgroundColor }}',
                            borderColor: '{{ $class->backgroundColor }}',
                            eventType:'classTutor',
                            ajax : true,
                            // editable:false,
                            },
                        @endforeach
                    @endif

                ],


                select: function(info) {

                    var day = info.start.toString().substring(0, 3);
                    // alert('selected ' + getDayOfWeek.indexOf(day));
                    var dayOfWeek = getDayOfWeek.indexOf(day);
                    var start = info.start.toString().substring(16, 24);
                    var end = info.end.toString().substring(16, 24);

                    swal({
                            title: "Add a new event?",
                            icon: "info",
                            buttons: true,
                        })
                        .then(function(willDelete) {
                            if (willDelete) {
                                $("#update-events").css("display", "none");
                                $("#add-events").css("display", "block");
                                $("#day").val(day);
                                $("#dayOfWeek").val(dayOfWeek);
                                $("#startTime").val(start);
                                $("#endTime").val(end);

                            } else {
                                $("#add-events").css("display", "none");
                            }

                        });

                },
                // dayClick: function(date, jsEvent, view) {
                //     //Change background color of day when it is clicked
                //     $(this).css('background-color', '#bed7f3');
                //     //Get the date that was clicked
                //     var date_clicked = date.format();
                //     //Redirect to the new event entry form
                //     window.location.href = "{{ URL::to('events') }}" + "/" + date_clicked;
                // },

                eventClick: function(info) {
                    // alert('Event: ' + info.event.title);
                    var day = info.event.start.toString().substring(0, 3);
                    // alert('selected ' + getDayOfWeek.indexOf(day));
                    var dayOfWeek = getDayOfWeek.indexOf(day);
                    var start = info.event.start.toString().substring(16, 24);
                    var end = info.event.end.toString().substring(16, 24);
                    var typeText;

                    $("#add-events").css("display", "none");
                    $("#update-events").css("display", "block");
                    $("#id").val(info.event.id);
                    $("#idDel").val(info.event.id);
                    $("#titleUpdate").val(info.event.title);
                    $("#descriptionUpdate").val(info.event.extendedProps.description);
                    $("#dayUpdate").val(day);
                    $("#dayOfWeekUpdate").val(dayOfWeek);
                    $("#startTimeUpdate").val(start);
                    $("#endTimeUpdate").val(end);

                    if (info.event.extendedProps.eventType == "event") {
                        typeText = "Event";
                        $("#titleUpdate").attr('placeholder', 'Title');
                        $("#descriptionUpdate").attr('placeholder', 'Description');
                    } else {
                        typeText = "Class";
                        $("#titleUpdate").attr('placeholder', 'Class Name');
                        $("#descriptionUpdate").attr('placeholder', 'Subject');
                    }
                    $("#typeText").text(typeText);
                    // $("#backgroundColorUpdate").val(info.event.backgroundColor);
                    document.getElementById("backgroundColorUpdate").value = info.event.backgroundColor;

                    $("#eventType").val(info.event.extendedProps.eventType);
                    $("#eventTypeDel").val(info.event.extendedProps.eventType);
                },

                eventDragStart: function(event, jsEvent, view) {
                    $(this).css('background-color', '#dc7543');
                },


                eventDrop: function(info) {
                    var start = info.event.start.toString().substring(16, 24);
                    var end = info.event.end.toString().substring(16, 24);
                    var day = info.event.start.toString().substring(0, 3);
                    dayOfWeek = getDayOfWeek.indexOf(day);

                    swal({
                            title: "You moved the event. Save it?",
                            text: "You can move it as mush as you want.",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then(function(willDelete) {
                            if (willDelete) {

                                $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                            'content')
                                    },
                                    url: SITEURL + "/dashboard",
                                    type: "POST",
                                    data: {
                                        id: info.event.id,
                                        dayOfWeek: dayOfWeek,
                                        startTime: start,
                                        endTime: end,
                                        eventType: info.event.extendedProps.eventType,
                                        type: 'update',

                                    },
                                    success: function(response) {
                                        calendar.refetchEvents();
                                        displayMessage("Event Updated Successfully");
                                    }
                                });
                            } else {
                                toastr.info("Your event has not been rescheduled", 'Event');
                                info.revert();
                            }
                        });
                },



                eventResize: function(info) {
                    var start = info.event.start.toString().substring(16, 24);
                    var end = info.event.end.toString().substring(16, 24);
                    var day = info.event.start.toString().substring(0, 3);
                    dayOfWeek = getDayOfWeek.indexOf(day);

                    swal({
                            title: "Changed Timeline. Save it?",
                            text: "You can expand it as far as you need to.",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then(function(willDelete) {
                            if (willDelete) {
                                $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                            'content')
                                    },
                                    url: SITEURL + "/dashboard",
                                    type: "POST",
                                    data: {
                                        id: info.event.id,
                                        dayOfWeek: dayOfWeek,
                                        startTime: start,
                                        endTime: end,
                                        eventType: info.event.extendedProps.eventType,
                                        type: 'update',

                                    },
                                    success: function(response) {
                                        calendar.refetchEvents();
                                        displayMessage("Event Updated Successfully");
                                    }
                                });
                            } else {
                                toastr.info("Your event has not been rescheduled", 'Event');
                                info.revert();
                            }
                        });

                    $("#endTimeUpdate").val(end);


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

            function displayMessage(message) {
                toastr.success(message, 'Event');
            }

            $('form#deleteForm').click(function(event) {
                event.preventDefault();
                swal({
                        title: "Do you want to delete?",
                        text: "You can't recover once deleted",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then(function(willDelete) {
                        if (willDelete) {
                            $('form#deleteForm').submit();

                        } else {
                            event.preventDefault();
                        }
                    });
            });

            $("#eventAdd").click(function() {
                $("#title").attr('placeholder', 'Title')
                $("#description").attr('placeholder', 'Description')
            });
            $("#classAdd").click(function() {
                $("#title").attr('placeholder', 'Class Name')
                $("#description").attr('placeholder', 'Subject')
            });


        });
    </script>
    <meta name="csrf-token" content="{{ csrf_token() }}">



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

    <div id='add-events' style="display: none;">
        <h4 style="color:#000000">Add Events</h4>
        <form action="{{ route('dashboard') }}" method="post">
            @csrf
            @if (Auth::guard('web')->check())
                <table cellpadding="0" cellspacing="0" border="0" style="width: min-content;margin:10px 0">
                    <tr>

                        <td style="padding-right: 25px;">
                            <label class="container">Event
                                <input type="radio" id="eventAdd" name="eventTypeAdd" value="event" checked>

                                <span class="checkmark"></span>
                            </label>
                        </td>
                        <td>
                            <label class="container">Class
                                <input type="radio" id="classAdd" name="eventTypeAdd" value="classTutor">

                                <span class="checkmark"></span>
                            </label>
                        </td>

                    </tr>
                </table>
            @endif

            @if (Auth::guard('students')->check())
                <input type="hidden" id="eventTypeAdd" name="eventType" value="event">
            @endif

            <input type="text" id="title" name="title" placeholder="Title">
            <input type="text" id="description" name="description" placeholder="Description">
            <input type="text" id="day" name="day" readonly>
            <div style="display: flex">
                <input type="text" id="startTime" name="startTime" readonly style="text-align: center">
                <span style="text-align:center;padding:20px 15px 0;">to</span>
                <input type="text" id="endTime" name="endTime" readonly style="text-align: center">
            </div>
            <label for="BackgroundColor">Background Color</label><input type="color" id="backgroundColor"
                name="backgroundColor" value="#dc7543">
            <input type="hidden" id="type" name="type" value="add">
            <input type="hidden" id="type" name="email" value="{{ $userCurrent->user()->email }}">
            <input type="hidden" id="dayOfWeek" name="dayOfWeek">


            <button class="addButton" type="submit" name="addEvent" title="Save">Save</button>

        </form>
    </div>

    <div id='update-events' style="display: none;">
        <div style="position:relative;margin-bottom:20px;">
            <div><span style="color:#000000">Edit <span id="typeText"></span></span></div>
            <div class="deleteContainer">
                <form id="deleteForm" action="{{ route('dashboard') }}" method="post">
                    @csrf
                    <button id="deleteEvent" class="deleteButton" type="submit" name="deleteEvent" title="Delete"></button>
                    <input type="hidden" id="eventTypeDel" name="eventTypeDel">
                    <input type="hidden" id="idDel" name="idDel">
                    <input type="hidden" id="type" name="type" value="delete">

                </form>
            </div>
        </div>
        <form action="{{ route('dashboard') }}" method="post">
            @csrf

            <input type="text" id="titleUpdate" name="titleUpdate" placeholder="Title">
            <input type="text" id="descriptionUpdate" name="descriptionUpdate" placeholder="Description">
            <input type="text" id="dayUpdate" name="dayUpdate" readonly>
            <div style="display: flex">
                <input type="text" id="startTimeUpdate" name="startTimeUpdate" readonly style="text-align: center">
                <span style="text-align:center;padding:20px 15px 0;">to</span>
                <input type="text" id="endTimeUpdate" name="endTimeUpdate" readonly style="text-align: center">
            </div>
            <label for="BackgroundColorUpdate">Background Color</label><input type="color" id="backgroundColorUpdate"
                name="backgroundColorUpdate">
            <input type="hidden" id="type" name="type" value="updateDetails">
            <input type="hidden" id="dayOfWeekUpdate" name="dayOfWeekUpdate">
            <input type="hidden" id="id" name="id">
            <input type="hidden" id="eventType" name="eventType">



            <button class="addButton" type="submit" name="addEvent" title="Save">Save</button>

        </form>
    </div>

    {{-- <div style='clear:both'></div> --}}


    <style>
        .fc .fc-highlight {
            background-color: #fbecdf !important;
        }

        #external-events {
            box-sizing: border-box;
            margin-right: 24px;
            margin-top: 65px;
            float: right;
            width: calc(18.5% - 25px);
            max-height: calc(50vh - 65px);
            overflow: auto;
            padding: 0 10px;
            text-align: left;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 4px 35px rgba(154, 161, 171, 0.15)
        }

        #add-events,
        #update-events {
            box-sizing: border-box;
            margin-right: 24px;
            margin-top: 15px;
            float: right;
            width: calc(18.5% - 25px);
            padding: 15px;
            min-height: calc(50vh - 65px);
            overflow: auto;
            text-align: left;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 4px 35px rgba(154, 161, 171, 0.15);
            color: #808080;
        }

        #add-events input,
        #update-events input {
            padding: 10px;
            width: 100%;
            margin-top: 10px;
            border: 1px solid #808080;
            outline-color: #dc7543;
            border-radius: 5px;
            box-sizing: border-box;

        }

        #add-events input:read-only,
        #update-events input:read-only {
            padding: 10px;
            width: 100%;
            margin-top: 10px;
            border: 1px solid #808080;
            background-color: #eeeeee;
            outline: none;
            border-radius: 5px;
            box-sizing: border-box;

        }

        #add-events input[type=color],
        #update-events input[type=color] {
            padding: 0px;
            border: 0px;
            height: 30px;
            width: 45px;
            margin-top: 10px;
            margin-left: 20px;
            background-color: transparent;
            outline: none;
            border-radius: 0px;
            box-sizing: border-box;

        }

        #add-events .addButton,
        #update-events .addButton {
            background-color: transparent;
            width: 100%;
            height: 40px;
            border-radius: 5px;
            outline: 0;
            border: 1px solid #F28F3B;
            padding: 0 10px;
            color: #F28F3B;
            margin-top: 20px;
            box-sizing: border-box;
            cursor: pointer;
            transition: 0.3s;

        }

        #add-events .addButton:hover {
            background-color: #F28F3B;
            border: 1px solid #F28F3B;
            color: #ffffff;
            transition: 0.3s;
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

        .deleteButton {
            width: 40px;
            height: 40px;
            border: 1px solid #ff0000;
            box-sizing: border-box;
            cursor: pointer;
            transition: 0.3s;
            border-radius: 5px;
            z-index: 1;
            background: url({{ URL::asset('/image/bin.svg') }}) no-repeat;
            background-size: 30px 30px;
            background-position: center;
        }

        .deleteButton:hover {
            transition: 0.3s;
            background-color: #ff00003b;
        }


        .deleteContainer {
            width: 40px;
            position: absolute;
            right: 0px;
            top: 0px;
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

        .container {
            display: block;
            position: relative;
            padding-left: 35px;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .container input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        /* Create a custom radio button */

        .checkmark {
            position: absolute;
            top: -3px;
            left: 0;
            height: 24px;
            width: 24px;
            border: 1px solid #000;
            background-color: transparent;
            border-radius: 50%;
        }

        .container input:checked~.checkmark {
            border: 1px solid #ff6600;
        }


        /* Create the indicator (the dot/circle - hidden when not checked) */

        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }


        /* Show the indicator (dot/circle) when checked */

        .container input:checked~.checkmark:after {
            display: block;
        }


        /* Style the indicator (dot/circle) */

        .container .checkmark:after {
            top: 5px;
            left: 5px;
            width: 14px;
            height: 14px;
            border-radius: 50%;
            background: #ff6600;
        }

    </style>
@endsection
