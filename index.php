<?php
require 'dbconfig/config.php'
?>
<!DOCTYPE html>
<html>
<body>
<head>
<link rel='stylesheet' href='fullcalendar/fullcalendar.css' />
<script src='lib/jquery.min.js'></script>
<script src='lib/moment.min.js'></script>
<script src='fullcalendar/fullcalendar.js'></script>
<!- //Initializing with options ->
<script>
$(document).ready(function() {

// page is now ready, initialize the calendar...
var calendar =$('#calendar').fullCalendar({
  defaultView: 'agendaWeek',
  editable:true,
  allDaySlot: false,
  selectable:true,
  selectHelper:true,
  header: {
    left: 'prev,next,today',
    center: 'title',
    right: 'month,basicWeek,basicDay'
  },
  events: 'load.php',
    
});

$('#calendar').fullCalendar({
  dayClick: function() {
    alert('a day has been clicked!');
  }
  });

$('#my-next-button').click(function() {
  $('#calendar').fullCalendar('next');
});

});
</script>
</head>
<h1>...</h1>
<form  action="index.php" method="post">
  <fieldset>
    <legend>Personal Information:</legend>
    Full Name:<br>
  <input type="text" name="full_name"><br>
  Age:<br>
  <input type="number" name="age"><br>
  Gender:<br>
  <input type="text" name="gender"><br>
  PhoneNumber:<br>
  <input type="number" name="phone_number"><br><br>
  <button id="sbm_go" name="submit_btn" type="submit" value="Submit">Submit</button>
  </fieldset>
</form>
<form action="index.php" method="post">
  <fieldset>
    <legend>Delete User:</legend>
    Enter Name:<br>
    <input type="text" name="delete_name"><br>
    <button name="delete_btn" type="submit">Delete</button>    
</fieldset>
</form>

<!- //Basic clalender view ->
<div id='calendar'></div>

<!- //Next button ->
<button id='my-next-button'>Next month</button>

  <?php
  if(isset($_POST['delete_btn'])){
    @$dname = $_POST['delete_name'];
    $query = "delete from staff where name = '$dname'";
      $query_run = mysqli_query($con, $query);
      if($query_run){
        echo'<script type="text/javascript">alert("User deleted")</script>';
      }
      else{
        echo'<script type="text/javascript">alert("User not deleted")</script>';
      }
  }
  if(isset($_POST['submit_btn'])){
    //echo'<script type="text/javascript">alert("Insert Clicked")</script>';
    @$name = $_POST['full_name'];
    @$age = $_POST['age'];
    @$gender = $_POST['gender'];
    @$phoneNumber = $_POST['phone_number'];

    if($name=="" || $age=="" || $gender=="" || $phoneNumber=="")
    {
      echo'<script type="text/javascript">alert("Fill all fields")</script>';
    }
    else{
      $query = "insert into staff values('$name',$age,'$gender',$phoneNumber)";
      $query_run = mysqli_query($con, $query);
      if($query_run){
        echo'<script type="text/javascript">alert("Values inserted")</script>';
      }
      else{
        echo'<script type="text/javascript">alert("Values not inserted")</script>';
      }
    }
    
  }
  ?>
</body>
<html>
