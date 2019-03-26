<?php

//insert.php

$connect = new PDO('mysql:host=localhost;dbname=test', 'root', '');

if(isset($_POST["title"]))
{
 $query = "
 INSERT INTO `appointments` 
 (`app_id`, `title`, `start`, `end`, `d_id`)
  VALUES (:app_id,:title,:start,:end,:d_id)
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':app_id'  => $_POST['app_id'],
   ':title' => $_POST['title'],
   ':start' => $_POST['start'],
   ':end' => $_POST['end'],
   ':d_id' => $_POST['d_id']
  )
 );
}


?>