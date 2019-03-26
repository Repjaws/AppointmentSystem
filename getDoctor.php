<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "appointmentsys_v1";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$spec_Name = $_GET['specialization_name'];

$query = "SELECT CONCAT(doctor.first_name,' ',doctor.second_name) AS 'full_name'
FROM doctor,doctor_specialization,specialization
WHERE doctor.id = doctor_specialization.doctor_id 
AND doctor_specialization.specialization_id = specialization.id
AND specialization.specialization_name LIKE '%$spec_Name%'";

$result = mysqli_query($conn,$query); 

//echo '<option value="test">'.$spec_Name.'</option>';
while ($row = $result->fetch_assoc()){
	$fullName = $row['full_name'];
	echo '<option value="'.$fullName.'">'.$fullName.'</option>';
}
?>