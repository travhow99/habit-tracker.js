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
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
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
    <form action="new-habit.php" method="POST" role="form">
      <legend>Let's add a new habit</legend>
    
      <div class="form-group">
        <label for="">What habit do you want to add?</label>  <i class="fa-hidden fas fa-exclamation-circle"></i>
        <input type="text" name="name" class="form-control" id="" placeholder="New Habit">
      </div>

      <div class="form-group">
        <label for="">How many times a week do you want to do this?</label>  <i class="fa-hidden fas fa-exclamation-circle"></i>
        <input type="number" name="goal" class="form-control" id="" placeholder="Habit Goal">
			</div>
			
			<div class="form-group">
			<label for="">Choose a label for your new habit!</label>  <i class="fa-hidden fas fa-exclamation-circle"></i>
				<select name="category" id="categoryInput" class="form-control" placeholer="Category">
					<option default disabled selected>Category</option>
					<option value="10000">New Category</option>
				</select>
			</div>
      <button id="newHabitSubmit"  type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  <div class="overlay">
  </div>

  <script type="text/javascript" src="index.js"></script>
</body>
</html>
