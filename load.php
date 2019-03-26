<?php

//load.php

$connect = new PDO('mysql:host=localhost;dbname=test', 'root', '');

$data = array();

$query = "SELECT * FROM appointments where `d_id` = 1";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'app_id'   => $row["app_id"],
  'title'   => $row["title"],
  'start'   => $row["start"],
  'end'   => $row["end"],
  'd_id' =>$row["d_id"]
 );
}

echo json_encode($data);

?>