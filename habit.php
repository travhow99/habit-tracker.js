<?php
include('config.php');
  if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


$weekdays = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');

// Establish Habits class
// Each Habits obj should
  // have name
  // Have set number/week
  // Allow for removal
  // Have a category
  // Allow for changing of category

  class Habit {

    public function __construct ($name, $goal) {
      $this->name = $name;
      $this->goal = $goal;
    }

    function setGoal($goal) {
    }

    function setCategory($cat) {
      $this->$cat = $cat;
    }

    function changeCategory($cat) {
      $this->$cat = $cat;
    }

    function delete($delete) {
      $this->$delete = $delete;
    }

    function getName() {
      echo $this->name;
    }


    function getCurrent($weekday) {

      $this->$weekday = 1;

      //echo $weekday." ".$this->$weekday;

    }

    function displayTracker() {
      global $weekdays;
      foreach ($weekdays as $weekday) {
        if (isset($this->$weekday) && $this->$weekday === 1) {
          echo "<input type='checkbox' class='tracker-toggle active' for={$weekday}>";
        } else {
          echo "<input type='checkbox' class='tracker-toggle' for={$weekday}>";
        }
      }
    }

    // Check db for previous checks

  }


// Get user_id
$user_id = 0;
$week = date('W');
$habitsArray = array();

$habits = array();


$result = mysqli_query($conn, "SELECT * FROM habits WHERE user_id=$user_id AND week=$week");

if ($result){
  // Fetch one and one row
  while ($row=mysqli_fetch_array($result)) {
    //$row['name'] = array();
    array_push($habitsArray,$row['name']);

    $row['name'] = new Habit($row['name'], 3);

    array_push($habits, $row['name']);

    foreach ($weekdays as $weekday) {
      if ($row[$weekday]) {
        $row['name']->getCurrent($weekday);
        //echo $row['name'].": ".$weekday;
        //array_push($row['name'], $weekday);
      }
    }
    //print_r($habitsArray);
  }
}


// Table Structure
// habits
// id user_id week name goal category






/* foreach ($habits as $habit) {
  echo $habit->getName();
} */


 //print_r($habits);


// $Meditate = new Habit('Meditate', 7);
// $Exercise = new Habit('Exercise', 4);
// $Read = new Habit('Read', 3);

// $habits = array($Meditate, $Exercise, $Read);


?>
