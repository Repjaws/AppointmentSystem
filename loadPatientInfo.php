<?php
session_start();
//require 'dbconfig/config.php';
//$connect = new PDO('mysql:host=localhost;dbname=appointmentsys_v1', 'root', '');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "appointmentsys_v1";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$p_id = $_SESSION['id'];
$data = array();

//$query = "SELECT appointments.start,appointments.end,appointments.title 
//FROM appointments,patient_appointments 
//where appointments.app_id = patient_appointments.app_id 
//AND patient_appointments.p_id = '$p_id'";

$query = "SELECT appointment.start,appointment.end,appointment_status.status
FROM appointment,appointment_status
WHERE appointment.patient_id = $p_id
AND appointment.appointment_status_id = appointment_status.id";
//$statement = $con->prepare($query);
$result = mysqli_query($conn,$query); 
if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    else
    {
        echo "0 results";
    }

echo json_encode($data);

?>