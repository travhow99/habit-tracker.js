<?php
  include('habit.php');

  $week = date('W');

  $name = $_POST['name'];
  $goal = $_POST['goal'];
  $cat = 'main';

  $sql = "INSERT INTO habits(user_id, week, name, goal, category) VALUES (0, $week, '$name', $goal, '$cat')";
  mysqli_query($conn, $sql);

/*
  $name = new Habit($name, $goal);

  array_push($habits, $name);
*/
?>
