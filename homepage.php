<?php
	session_start();
	require 'dbconfig/config.php'
?>
<!DOCTYPE html>
<html>

<head>
    <title>Home Page</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel='stylesheet' href='fullcalendar/fullcalendar.css' />
    <script src='lib/jquery.min.js'></script>
    <script src='lib/moment.min.js'></script>
    <script src='fullcalendar/fullcalendar.js'></script>
    <script>
    $(document).ready(function() {
        var calendar = $('#calendar').fullCalendar({
            header: {
                left: 'prev,next,today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay',
            },
            defaultView: 'agendaWeek',
            minTime: "08:00:00",
            maxTime: "18:00:00",
            //scrollTime: '18:00:00',
            editable: false,
            allDaySlot: false,
            //selectable:true,
            //selectHelper:true,

            events: 'loadPatientInfo.php'

        });

    });
    </script>
</head>

<body>
    <div id="main-wrapper">
        <center>
            <h2>Home Page</h2>
        </center>
        <center>
            <h3>Pateint ID : <?php echo $_SESSION['id']; ?></h3>
        </center>
        <center>
            <h3>Welcome <?php echo $_SESSION['firstName']; ?></h3>
        </center>

        <form>
            <div class="imgcontainer">
                <img src="img/userAvatar.png" alt="Avatar" class="avatar">
            </div>
            <div class="inner_container">
                <button class="logout_button" type="submit">Log Out</button>
                <a href="book.php"><button class="book_button" type="button">Book Appointment</button></a>
            </div>

        </form>
    </div>
    <center>
        <div id='calendar'></div>
    </center>
</body>

</html>