@extends('layout.nav')

@section('content')


    <style>
        hr {
            border-top: 1px solid #ccc;
        }

        .containerSetting {
            width: calc(100% - 13.54vw);
            float: right;
            margin-top: 45px;
            box-sizing: border-box;
            position: relative;
            /* height: calc(100vh - 45px); */
            padding-bottom: 40px;
        }

        #classes {
            background: #ffffff;
        }

        #classes ul li.active a {
            color: #E87247;
        }

        .classBanner {
            width: 100%;
            background: #E87247;
            background: linear-gradient(rgba(242, 143, 59, .65), rgba(242, 143, 59, .65)), url(../image/classbackground.jpg);
            background-size: cover;
            display: flex;
            height: 150px;
        }

        .bannerTitle {
            max-width: 1000px;
            margin: auto;
            width: 100%;
            position: relative;
        }

        .lectName {
            position: absolute;
            bottom: 0px;
            right: 0px;
            font-size: 24px;
        }

        .classContent {
            max-width: 1000px;
            margin: auto;
            width: 100%;
            position: relative;
            margin-top: 25px;
        }

        .addContentButton {
            text-decoration: none;
            width: 100%;
            text-align: center;
            display: flex;
            white-space: nowrap;
            justify-content: center;
            align-items: center;
            color: #cccccc;
            transition: 0.2s;
            margin: 10px 0;
        }

        .addContentButton div {
            background: #cccccc;
            width: 100%;
            height: 1px;
            transition: 0.2s;
        }

        .addContentButton:hover {
            color: #E87247;
            transition: 0.1s;
        }

        .addContentButton:hover div {
            background: #E87247;
            width: 100%;
            height: 1px;
            transition: 0.1s;
        }

        .contentClass {
            color: #808080;
            display: none;
        }

        .contentClass input,
        textarea {
            color: #808080;
            padding: 10px;
            width: 100%;
            box-sizing: border-box;
        }

        .noteContentFull input,
        textarea {
            color: #808080;
            padding: 10px;
            width: 100%;
            box-sizing: border-box;
        }


        .saveNote,
        .saveNoteEdit {
            display: flex;
            width: 150px;
            box-sizing: border-box;
            padding: 10px;
            text-align: center;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            margin-top: 10px;
            float: right;
            color: #E87247;
            border: 1px solid #E87247;
            background: transparent;
            border-radius: 5px;
        }

        .saveNote:hover,
        .saveNoteEdit:hover {
            color: #E87247;
            border: 1px solid #E87247;
            background: #e8724733;
            border-radius: 5px;
        }

        .closeNote,
        .closeNoteEdit {
            display: flex;
            width: 150px;
            box-sizing: border-box;
            padding: 10px;
            text-align: center;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            margin-top: 10px;
            margin-right: 15px;
            color: #ff0000;
            border: 1px solid #ff0000;
            background: transparent;
            border-radius: 5px;
        }

        .closeNote:hover,
        .closeNoteEdit:hover {
            color: #ff0000;
            border: 1px solid #ff0000;
            background: #ff000030;
            border-radius: 5px;
        }

        .studentListContainer {
            position: fixed;
            height: calc(100vh - 45px);
            right: -500px;
            top: 45px;
            width: 500px;
            background: #ffffff;
            box-shadow: 0px 20px 10px 3px rgb(0 0 0 / 10%);
            padding: 30px 20px 70px;
            box-sizing: border-box;
            color: #808080;
            transition: 0.3s;
        }

        .studentListContainer.active {
            right: 0px;
            transition: 0.3s;
        }

        .studentListTable {
            width: 100%;
            border-collapse: collapse;
            display: table;
        }

        .studentListTable .tr {
            border-bottom: 1px solid #dddddd;
            display: table-row;
        }

        .studentListTable .td {
            padding: 0 15px;
            display: table-cell;
        }

        .studentName {
            width: 100%;
            text-decoration: none;
            color: #808080;
            display: flex;
            padding: 13px;
            box-sizing: border-box;
            border-radius: 5px;
        }

        .studentName:hover {
            background: #f0f0ff;
        }

        .expandButton {
            width: 30px;
            height: 60px;
            border-radius: 30px 0 0 30px;
            background: #E87247;
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            top: 50%;
            right: 500px;
            transform: translateY(-50%);
            cursor: pointer;
            padding-left: 10px;
            box-sizing: border-box;
        }

        .expandButton i::after {
            content: 'arrow_back_ios'
        }

        .active .expandButton i::after {
            content: 'arrow_forward_ios'
        }

        .notNoteFoundContainer {
            text-align: center;
            width: 100%;
        }

        .notFoundContainer {
            text-align: center;
            position: absolute;
            width: 100%;
            top: 50%;
            transform: translateY(-50%);
        }

        .noteContent {
            line-height: 2;
            color: #808080;
            /* white-space: pre-wrap; */
            text-align: justify;
        }

        .countStudent {
            font-size: 35px;
            font-weight: 600;
            color: #F28F3B;
            position: absolute;
            bottom: 20px;
            right: 20px;
        }

        .titleInput::placeholder {
            color: red;
            opacity: 1;
        }


        .noteContentFull {
            padding: 20px;
            position: relative;
        }



        .noteContentFull:hover .buttonContainer {
            transition: 0.2s;
            opacity: 1;
        }

        .editing:hover .buttonContainer {
            transition: 0.2s;
            opacity: 0;
        }

        .buttonContainer {
            opacity: 0;
            display: flex;
            column-gap: 10px;
            position: absolute;
            top: 10px;
            right: 10px;
            transition: 0.2s;
        }

        .buttonContainer2 {
            display: flex;
            float: right;
            margin: 5px 0px 40px;
            width: 100%;
            justify-content: flex-end;
        }





        .deleteNo {
            width: 32px;
            height: 32px;
            border: 1px solid #ff0000;
            box-sizing: border-box;
            cursor: pointer;
            transition: 0.3s;
            border-radius: 5px;
            z-index: 1;
            background: url('{{ URL::asset('/image/bin.svg') }}') no-repeat;
            background-size: 20px 20px;
            background-position: center;
        }

        .editNo {
            width: 32px;
            height: 32px;
            border: 1px solid #808080;
            box-sizing: border-box;
            cursor: pointer;
            transition: 0.3s;
            border-radius: 5px;
            z-index: 1;
            background: url('{{ URL::asset('/image/edit.svg') }}') no-repeat;
            background-size: 20px 20px;
            background-position: center;
        }

        .deleteNo:hover {
            background-color: #ff00003b;
            transition: 0.3s;
        }

        .editNo:hover {
            background-color: #e0e0e0;
            transition: 0.3s;
        }

        .editing {
            margin-bottom: 78px;
            background: #f9f9f9;
        }

    </style>
    @if (Auth::guard('web')->check())
        <style>
            .noteContentFull:hover {
                background: #f9f9f9;
            }

        </style>
    @endif

    @php
    if (Auth::guard('students')->check()) {
        $userCurrent = Auth::guard('students');
    } elseif (Auth::guard('web')->check()) {
        $userCurrent = Auth::guard('web');
    }

    $id = request()->get('id');
    // $classes = DB::table('classes')
    //     ->where('emailTutor', $userCurrent->user()->email)
    //     ->whereNotNull('dayOfWeek')
    //     ->get();

    // $getDayofWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thusday', 'Friday', 'Saturday'];

    // function secondsToTime($seconds)
    // {
    //     $dtF = new \DateTime('@0');
    //     $dtT = new \DateTime("@$seconds");
    //     return $dtF->diff($dtT)->format('%h h %i min');
    // }

    $classesStudent = DB::table('classes')
        ->leftJoin('enroll', 'classes.id', '=', 'enroll.idClass')
        ->leftJoin('students', 'enroll.emailStudent', '=', 'students.email')
        ->whereNotNull('classes.dayOfWeek')
        ->where('classes.id', $id)
        ->whereNotNull('enroll.idClass')
        ->select('classes.*', 'enroll.*', 'students.username', 'students.id as idStudent')
        ->get();

    $classesNote = DB::table('notes')
        ->where('idClass', $id)
        ->orderBy('id', 'DESC')
        ->get();

    $studentCount = $classesStudent->count();

    @endphp
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="containerSetting">
        <div class="classBanner">
            <div class="bannerTitle">
                <h2 style="font-size: 28px;font-weight:600;margin-bottom:20px">{{ $classes->subject }}</h2>
                <h1 style="font-size: 38px">{{ $classes->className }}</h1>
                <div class="lectName">{{ $classes->username }}</div>
            </div>

        </div>
        <div class="classContent">
            <h2 style="font-size: 28px;font-weight:600;color:#808080">Content</h2>

            @if (Auth::guard('web')->check())
                <a class="addContentButton" href="#" onclick="CKEDITOR.replace('note');">
                    <div style="margin-right: 15px;"></div>Add Note<div style="margin-left: 15px;"></div>
                </a>
            @endif
            <div class='contentClass' style="margin-bottom: 75px;">
                <div>
                    <form action='{{ route('classDetails') }}' method='post'>
                        @csrf
                        <label for='titleNote'>Title: </label>
                        <input class="titleInput" name='title' type='text'><br><br><label for='titleNote'>Note: </label>
                        <textarea style="display:none" name='note' id='note' rows='10' cols='80'></textarea>
                        <input type='hidden' name='id' value='{{ $id }}'><input type='hidden' name='type'
                            value='createNote'>
                        {{-- <input name='_token' value='" +csrfVar +"' type='hidden'> --}}
                        <div
                            style="    display: flex;
                                                                                                                float: right;
                                                                                                                margin: 5px 0px 40px;
                                                                                                                width: 100%;
                                                                                                                justify-content: flex-end;">
                            <button class='closeNote' type='reset'>Cancel</button>
                            <button class='saveNote' type='submit'>Save</button>
                        </div>
                    </form>
                </div>
                {{-- <script>
                    CKEDITOR.replace('note');
                </script> --}}
            </div>

            @if ($classesNote->count() <= 0)
                <div class="notNoteFoundContainer" style="margin-top:25px;">
                    <img src="{{ URL::asset('/image/not found.png') }}" draggable="false" style="width:40%;">
                    <div style="margin-bottom:15px;">
                        <h2 style="font-size:28px;color:#F28F3B;font-weight:600;">No Notes Found</h2>
                    </div>
                    @if (Auth::guard('web')->check())
                        <div style="color:#808080;">Add your class notes now!</div>
                    @endif
                    @if (Auth::guard('students')->check())
                        <div style="color:#808080;">No notes added by your teacher yet</div>
                    @endif

                </div>
            @else
                <div>
                    @foreach ($classesNote as $classesNote)
                        <div class="noteContentFull">
                            @if (Auth::guard('web')->check())

                                <form class="editNoteForm" action="{{ route('classDetails') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="type" value="editNote">
                                    <input type="hidden" name="noteIdEdit" value="{{ $classesNote->id }}">
                            @endif
                            <div class="titleNote">
                                <h2 style="font-size:28px;color:#F28F3B;font-weight:600;">{{ $classesNote->title }}
                                </h2>
                            </div>
                            <div class="noteContent">@php echo $classesNote->content @endphp</div>
                            
                            @if (Auth::guard('web')->check())

                                <div>
                                    <textarea id="note{{ $classesNote->id }}" style="display:none;"
                                        class="noteEditClass" name='noteEdit' rows='10' cols='80'></textarea>
                                </div>
                                </form>
                            @endif

                            @if (Auth::guard('web')->check())
                                <div class='buttonContainer'>
                                    <div>
                                        <form class="deleteNoteForm" action="{{ route('classDetails') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="type" value="deleteNote">
                                            <input type="hidden" name="noteIdDelete" value="{{ $classesNote->id }}">
                                            <button class="deleteNo" type="submit"></button>
                                        </form>
                                    </div>
                                    <div>
                                        <button class="editNo" type="submit"></button>
                                    </div>

                                </div>
                            @endif
                        </div>
                        <hr>
                    @endforeach
                </div>
            @endif
            {{-- <div class="contentClass">
                <div>
                    <form>
                        <label for="titleNote">Title: </label>
                        <input name="title" type="text"><br><br>
                        <label for="titleNote">Note: </label>
                        <textarea name="note" rows="4"></textarea>
                        <button class="saveNote" type="submit">Save</button>
                    </form>
                </div>
            </div> --}}


            {{-- <div style="color:#000000">11234</div> --}}
        </div>
        <div class="studentListContainer">
            <h2 style="font-size: 24px;font-weight:600;color:#808080;margin-bottom:10px;text-align: center;">Students
            </h2>
            @if ($classesStudent->count() <= 0)
                <div class="notFoundContainer"><img src="{{ URL::asset('/image/nostudent.jpg') }}" draggable="false"
                        style="width:70%;">
                    <div style="margin-bottom:15px;">
                        <h2 style="font-size:28px;color:#F28F3B;font-weight:600;">No Student Found</h2>
                    </div>
                    <div style="color:#808080;">No student enroll this class yet</div>
                </div>
            @else
                <div class="studentListTable">
                    @foreach ($classesStudent as $classesStudent)
                        <div class="tr">
                            <a class="studentName" @if (Auth::guard('web')->check())
                                href="/student/details?id={{ $classesStudent->idStudent }}"
                    @endif
                    title="">
                    <div class="td">{{ ++$loop->index }}</div>
                    <div class="td">{{ $classesStudent->username }}</div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="countStudent">{{ $studentCount }} <span style="font-size: 24px;color:#808080">Student</span>
        </div>
        @endif
        <a class="expandButton"><i class="material-icons"></i><a>
    </div>
    </div>

    <script>
        $(document).ready(function() {
            $(".navBar").find('[data-menu = classes]').addClass("active");
            $(".navBar").find('[data-menu = class]').addClass("active");

            $(".expandButton").click(function() {
                if ($(this).parent().hasClass("active")) {
                    $(this).parent().removeClass("active");
                } else {
                    $(this).parent().addClass("active");
                }
                $('textarea').each(function() {
                    $(this).val($(this).val().trim());
                });
            })

            $(".addContentButton").click(function() {

                $(".contentClass").show();
            })

            $(".closeNote").click(function() {
                $('.titleInput').css('border', '1px solid #808080');
                $('.titleInput').attr('placeholder', '');
                $(".contentClass").hide();
            })

            $(".saveNote").click(function(event) {
                $('.titleInput').css('border', '1px solid #808080');
                $('.titleInput').attr('placeholder', '');
                $("#cke_note").css('border', '1px solid #d1d1d1');

                event.preventDefault();
                if ($(this).parents('.contentClass').find('.titleInput').val() == '') {
                    $('.titleInput').css('border', '1px solid #ff0000');
                    $('.titleInput').attr('placeholder', 'Please Enter the title');
                }

                // else if (CKEDITOR.instances['#note'].getData() == "") {
                //     $("#cke_note").css('border', '1px solid #ff0000');
                // }
                else {
                    $(this).parents('form').submit();
                }
            })


            $(".deleteNo").click(function(event) {
                event.preventDefault();
                var form = $(this).parents(".deleteNoteForm");
                swal({
                        title: "Delete this note?",
                        icon: "warning",
                        buttons: true,
                    })
                    .then(function(willDelete) {
                        if (willDelete) {
                            $(form).submit();
                        }
                    });
            })


            $(".editNo").click(function(event) {
                // var form = $(this).parents(".editNoteForm");
                var self = this;

                swal({
                        title: "Edit this note?",
                        icon: "info",
                        buttons: true,
                    })
                    .then(function(willDelete) {
                        if (willDelete) {
                            var noteEdit = $(self).parents('.noteContentFull').find('.noteEditClass')
                                .attr('id');

                            var titleText = $.trim($(self).parents('.noteContentFull').find('h2')
                                .html());
                            var contentText = $(self).parents('.noteContentFull').find('.noteContent')
                                .html();

                            $(self).parents('.noteContentFull').find('.noteContent').hide();
                            $(self).parents('.noteContentFull').find('.titleNote').hide();

                            CKEDITOR.replace(noteEdit);
                            CKEDITOR.instances[noteEdit].setData(contentText);

                            $(self).parents('.noteContentFull').addClass('editing');
                            $(self).parents('.noteContentFull').find('.editNoteForm').append(
                                '<div class="buttonContainer2"><button class = "closeNoteEdit" type ="reset"> Cancel </button> <button class ="saveNoteEdit" type = "submit"> Save </button> </div>'
                            );
                            $(self).parents('.noteContentFull').find('.editNoteForm').prepend(
                                '<div class="titleEdit"><label for="titleNote" style="color:#808080">Title: </label><input class="titleInput" name="title" type="text" value="' +
                                titleText +
                                '"><br><br><label for="titleNote" style="color:#808080">Note: </label></div>'
                            );
                        }
                    });
            })


            $(".noteContentFull").on("click", ".closeNoteEdit", function() {
                var self = this;
                swal({
                        title: "Cancel editing this note?",
                        icon: "warning",
                        buttons: true,
                    })
                    .then(function(willDelete) {
                        if (willDelete) {
                            var noteEdit = $(self).parents('.noteContentFull').find('.noteEditClass')
                                .attr('id');

                            $(self).parents('.noteContentFull').find('.noteContent').show();
                            $(self).parents('.noteContentFull').find('.titleNote').show();
                            $(self).parents('.noteContentFull').removeClass('editing');

                            $(".buttonContainer2").remove();
                            $(".titleEdit").remove();

                            CKEDITOR.instances[noteEdit].destroy();

                            $('#' + noteEdit + '').hide();

                            console.log(contentText);
                        }
                    });
            });

            // $(".closeNoteEdit").on("click", function (){
            //     console.log('123');
            //     var self = this;
            //     swal({
            //             title: "Cancel editing this note?",
            //             icon: "warning",
            //             buttons: true,
            //         })
            //         .then(function(willDelete) {
            //             if (willDelete) {
            //                 var noteEdit = $(self).parents('.noteContentFull').find('.noteEditClass').attr('id');

            //                 $(self).parents('.noteContentFull').find('.noteContent').show();
            //                 $(self).parents('.noteContentFull').find('.titleNote').show();

            //                 CKEDITOR.replace(noteEdit);

            //                 ('noteEdit').ckeditorInstance.destroy();

            //                 $(self).parents('.noteContentFull').removeClass('editing');

            //                 console.log(contentText);
            //             }
            //         });
            // })




        })
    </script>

@endsection
