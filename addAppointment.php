<?php
    session_start();
    require_once('dbconfig/config.php');
    require_once('addAppointment.php');
?>
<?php
if(isset($_POST['book']))
{
    @$docName = $_POST['doctor-choice'];
    @$firstName = explode(" ",$docName)[0];
    @$date = $_POST['date'];
    @$time = $_POST['time'];

    $time = str_replace("am",":00",$time);
    $time = str_replace("pm",":00",$time);

    $dateArray = explode("-",$date);
    if($dateArray[1]=='Jan'){
        $dateArray[1]='01';
    }
    else if($dateArray[1]=='Feb'){
        $dateArray[1]='02';
    }
    else if($dateArray[1]=='Mar'){
        $dateArray[1]='03';
    }
    else if($dateArray[1]=='Apr'){
        $dateArray[1]='04';
    }
    else if($dateArray[1]=='May'){
        $dateArray[1]='05';
    }
    else if($dateArray[1]=='Jun'){
        $dateArray[1]='06';
    }
    else if($dateArray[1]=='Jul'){
        $dateArray[1]='07';
    }
    else if($dateArray[1]=='Aug'){
        $dateArray[1]=='08';
    }
    else if($dateArray[1]=='Sep'){
        $dateArray[1]='09';
    }
    else if($dateArray[1]=='Oct'){
        $dateArray[1]='10';
    }
    else if($dateArray[1]=='Nov'){
        $dateArray[1]='11';
    }
    else if($dateArray[1]=='Dec'){
        $dateArray[1]='12';
    }

$startTime = $time;
$timeArray = explode(":",$startTime);
$timeArray[0] = $timeArray[0] + 1;
$endTime = join(":",$timeArray);
//$fixed_date = join("-",$dateArray);
$fixed_date = $dateArray[2].'-'.$dateArray[1].'-'.$dateArray[0];
$full_Datetime_start = $fixed_date . ' ' . $startTime;
$full_Datetime_end = $fixed_date . ' ' . $endTime;
echo '<option value="test">'.$full_Datetime_start.'</option>';
echo '<option value="test">'.$full_Datetime_end.'</option>';
echo '<option value="test2">'.$firstName.'</option>';

$query = "SELECT office.id, doctor.first_name FROM office,doctor
WHERE office.doctor_id = doctor.id
AND doctor.first_name LIKE '$firstName%'";
$query_run = mysqli_query($con,$query);
if($query_run)
    {
        if(mysqli_num_rows($query_run)>0)
        {
            $row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
            $officeId  = $row['id'];
        }
    }
    echo '<option value="test2">'.$officeId.'</option>';
    $patientId = $_SESSION['id'];
$query = "INSERT INTO `appointment`(`patient_id`, `office_id`, `appointment_status_id`, `start`, `end`)
VALUES ('$patientId','$officeId','2','$full_Datetime_start','$full_Datetime_end')";
$query_run = mysqli_query($con,$query);
}
?>