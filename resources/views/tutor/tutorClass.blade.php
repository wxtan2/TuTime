@extends('layout.nav')

@section('content')

<div class="containerSetting">
    <div class = "mainContent">
        <table class="contentTable" style="table-layout: fixed; width:100%">
            <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
                <td style ="height: 10px";>
                    <input type="text" class="search" value="Search...">
                </td> 
                <td></td>   
                <td>
                    <input type="submit" class="searchButton" value="Search">
                </td>
            </tr>
            <tr style="height: 60px; text-align: center">
                <td>No</td>
                <td>Class Name</td>
                <td>Subject</td>
                <td>Day</td>
                <td>Start Time</td>
                <td>End Time</td>
                <td>Duration</td>
                <td>Students</td>
                <td></td>
            </tr>
            <tr style="height: 60px; text-align: center; color: #666666">
                <td>1</td>
                <td>Class A Form 4</td>
                <td>Biology</td>
                <td>Sunday</td>
                <td>08:00am</td>
                <td>10:30am</td>
                <td>2 hrs 30 min</td>
                <td style="font-size:35px; font-weight:bold; color: rgba(242, 143, 59, 65)">15</td>
                <td>
                    <input type="submit" class="viewButton" value=""">
                </td>
            </tr>
            <tr style="height: 60px; text-align: center; color: #666666">
                <td>2</td>
                <td>Class B Form 4</td>
                <td>Biology</td>
                <td>Sunday</td>
                <td>10:30am</td>
                <td>01:00pm</td>
                <td>2 hrs 30 min</td>
                <td style="font-size:35px; font-weight:bold; color: rgba(242, 143, 59, 65)">12</td>
                <td>
                    <input type="submit" class="viewButton" value=""">
                </td>
            </tr>
            <tr style="height: 60px; text-align: center; color: #666666">
                <td>3</td>
                <td>Class C Form 3</td>
                <td>Sejarah</td>
                <td>Monday</td>
                <td>10:30am</td>
                <td>12:30pm</td>
                <td>2 hrs</td>
                <td style="font-size:35px; font-weight:bold; color: rgba(242, 143, 59, 65)">6</td>
                <td>
                    <input type="submit" class="viewButton" value=""">
                </td>
            </tr>
            <tr style="height: 60px; text-align: center"></tr>
            <tr style="height: 60px; text-align: center"></tr>
            <tr style="height: 60px; text-align: center"></tr>
        </table>
    </div>
</div>

<style>
    .containerSetting{
        width:calc(100% - 13.54vw);
        display: flex;
        float: right;
        margin-top: 55px;
        height: 90vh;
        padding: 15px;
        box-sizing: border-box;
    }

    .mainContent{
        width:100%;
        display: flex;
        float: right;
        height: 90vh;
        padding: 0 0 0 10px;
        box-sizing: border-box;
    }

    .contentTable{
        color: rgba(242, 143, 59, 65);
       
    }

    .search{
        background-color: #F1F3FA;
        width: 200px;
        outline:0;
        border: none;
        padding: 5px;
        padding-left: 30px;
        color: #6C757D;
        font-size: 15px;
        background-image:url('/image/Vector.png');
        padding-left: 30px;
        background-size: 20px;
        background-repeat: no-repeat;
        border-radius: 5px;
    }

    .searchButton{
        background-color: rgba(242, 143, 59, 65); 
        width: 100%;
        outline = 0;
        border: none;
        padding: 5px;
        color: white; 
        font-size: 15px;
        border-radius: 5px;
    }

    .viewButton{
        width: 45px;
        padding: 8px;
        background-image:url('/image/View.png');
        background-position: center;
        background-size: 40px;
        background-repeat: no-repeat;
        border-radius: 10px;
        vertical-align: middle;
    }

</style>

@endsection