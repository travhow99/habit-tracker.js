<?php
  include('config.php');
    if (mysqli_connect_errno()){
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

  $week = date('W');

  $name = $_POST['name'];
  $goal = $_POST['goal'];
  $day = $_POST['day'];
  $checked = $_POST['checked'];
  $cat = $_POST['category'];

  $result = mysqli_query($conn, "SELECT 1 FROM habits WHERE week=$week AND name='$name' LIMIT 1");
  if (mysqli_fetch_row($result)) {
    $sql = "UPDATE habits SET user_id=0, week=$week, name='$name', goal=$goal, category='$cat', $day=$checked WHERE week=$week AND name='$name'";
    mysqli_query($conn, $sql);

  } else {
    $sql = "INSERT INTO habits(user_id, week, name, goal, category, $day) VALUES (0, $week, '$name', $goal, '$cat', $checked)";
    mysqli_query($conn, $sql);

  }




  echo $day;
?>
