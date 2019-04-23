<?php
  // TO DO
  // Mark entries as repeating to automatically show the next week
  // Add button in each category without submit button
  // Edit button for name/goal/category of each habit
  // Warning colors/push updates when goal is close to not being met
    // Muting/updating of individual notifications
  // Separate spending category to add transactions, with bar showing weekly budget allotment
  

  include('habit.php');

  // Build category dropown
  $sql = "SELECT DISTINCT `category` FROM `habits`";

  $result = mysqli_query($conn, $sql);

  $categories = array();

  $dropdown = '<select name="category" id="categoryInput" class="form-control" placeholer="Category">';

  while ($row=mysqli_fetch_array($result)) {
    $dropdown.="<option value='{$row[category]}'>{$row[category]}</option>";
    array_push($categories, $row[category]);
  }

  $dropdown.='<option value="10000">New Category</option></select>';

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
    <?php foreach ($categories as $category) { ?>
      <div class="category">
        <h3> <?php echo $category; ?> </h3>
        <div class="weekend-container">
          <div class="habit-name"></div>
            <?php foreach ($weekdays as $weekday) { ?>
              <span class="day-name"><?php echo $weekday ?></span>
            <?php } ?>
          </div>
        <ul class="habit-list">
          <?php
          foreach ($habits as $habit) {
            if ($category == $habit->cat) { ?>
            <li>
              <div class="habit-name">
                <span class="habit-title"><?php echo $habit->getName(); ?></span><?php echo $habit->showGoal(); ?>
              </div>
                    <?php  echo $habit->displayTracker(); ?>
              </li>
          <?php }
          } ?>
        </ul>
        <div class="add-row">
          <input class="habit-name">&nbsp;</input>
          <a class="btn btn-primary add-button"><i class="fas fa-plus-circle"></i></a>
        </div>
      </div>
    <?php } ?>
    <div class="btn-container">
      <a class="btn btn-success add-new">New Habit</a>
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
      <?php echo $dropdown; ?>
				<!-- <select name="category" id="categoryInput" class="form-control" placeholer="Category">
					<option default disabled selected>Category</option>
					<option value="10000">New Category</option>
				</select> -->
			</div>
      <button id="newHabitSubmit"  type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  <div class="overlay">
          <a class="close-button"><i class="fas fa-times-circle fa-2x"></i></a>
  </div>

  <script type="text/javascript" src="index.js"></script>
</body>
</html>
