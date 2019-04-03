<?php
  include('config.php');
    if (mysqli_connect_errno()){
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

  echo "test";
  $goal = $_POST['goal'];
  $day = $_POST['day'];
  $checked = $_POST['checked'];
  $cat = $_POST['category'];

  echo $day;
?>
