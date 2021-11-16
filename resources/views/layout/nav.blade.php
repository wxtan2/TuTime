<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/nav.css') }}">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <title>TuTime</title>
</head>

<body>
    <nav class="navBar">
        <img class="navLogo" src="image/logo.svg"> 
        <span class="navWord">NAVIGATION</span>
        <ul>
            <li class="list active">
                <a href="" title="Timetable" alt="Timetable">
                    <span class="icon">
                        <ion-icon name="today-outline"></ion-icon>
                    </span>
                    <span class="title">Timetable</span>
                </a>
            </li>
            <li class="list">
                <a href="" title="Classes" alt="Classes">
                    <span class="icon">
                        <ion-icon name="book-outline"></ion-icon>
                    </span>
                    <span class="title">Classes</span>

                </a>
            </li>
            <li class="list">
                <a href="" title="Students" alt="Students">
                    <span class="icon">
                        <ion-icon name="school-outline"></ion-icon>
                    </span>
                    <span class="title">Students</span>

                </a>
            </li>
            <li class="list">
                <a href="" title="Settings" alt="Settings">
                    <span class="icon">
                        <ion-icon name="settings-outline"></ion-icon>
                    </span>
                    <span class="title">Settings</span>

                </a>
            </li>
        </ul>
    </nav>
    
    <script>
    // $(document).ready(function(){
    //     $(".list").on("click",function(){
    //         $(".navBar").find(".list").removeClass("active");
    //         $(this).addClass("active");
    //     })
    // })

        var list = document.querySelectorAll('.list');
        for (var i = 0; i < list.length; i++) {
            list[i].onclick = function() {
                var j = 0;
                while (j < list.length) {
                    list[j++].className = 'list';
                }
                list[i].className = 'list active';
            }
        }
    </script>
    @yield('content')

</body>

</html>
