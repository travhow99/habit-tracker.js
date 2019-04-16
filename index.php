<?php
  include('habit.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Habit Tracker</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/main.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
</head>
<body>

  <header class="container-fluid">
    <h1>Habit Tracker</h1>
    <p>Habit tracking app to keep your busy life on track.</p>
  </header>

  <div class="container main">
    <div class="category">
      <h3>Main</h3>
      <table class="weekdays">
        <tr>
          <?php foreach ($weekdays as $weekday) { ?>
            <td class="day-name"><?php echo $weekday ?></td>
          <?php } ?>
        </tr>
      </table>
      <ul class="habit-list">
        <?php
        //print_r($habits);
        foreach ($habits as $habit) { ?>
          <li>
            <div class="habit-name">
              <span class="habit-title"><?php echo $habit->getName(); ?></span><?php echo $habit->showGoal(); ?>
            </div>
                  <?php  echo $habit->displayTracker(); ?></li>
        <?php } ?>
      </ul>
      <div class="btn-container">
        <a class="btn btn-success add-new">New Habit</a>
      </div>
    </div>
  </div>

  <!-- Add new popup form !-->
  <div class="habit-form">
    <form class="" action="new-habit.php" method="post">
      <label>What habit do you want to add?</label><input type="text" name="name" value=""><br>
      <label>How many times a week do you want to do this?</label><input type="number" name="goal" value="">
      <input id="newHabitSubmit" type="submit" value="Submit">
    </form>
  </div>
  <div class="overlay">
  </div>

  <script type="text/javascript" src="index.js"></script>
</body>
</html>
