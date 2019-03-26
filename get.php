<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "appointmentsys_v1";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$query = "SELECT * FROM specialization";
$result = mysqli_query($conn,$query); 

echo '<option value="default">Select Specialization</option>';
while ($row = $result->fetch_assoc()){
	$specName = $row['specialization_name'];
	echo '<option value="'.$specName.'">'.$specName.'</option>';
}
?>