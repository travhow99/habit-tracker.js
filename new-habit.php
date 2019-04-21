<?php
  include('config.php');
  include('habit.php');

  $week = date('W');

  $name = $_POST[name];
  $goal = $_POST[goal];
  $cat = $_POST[category];

  //echo $name.$goal.$cat;

  $sql = "INSERT INTO habits(user_id, week, name, goal, category) VALUES (0, $week, '$name', $goal, '$cat')";
  $result = mysqli_query($conn, $sql);
  //var_dump($result);

  if ($result) {
    array_push($habitsArray,$name);

    $name = new Habit($name, $goal, $cat);

    array_push($habits, $name);

  }
  

/*
  $name = new Habit($name, $goal);

  array_push($habits, $name);
*/
?>
