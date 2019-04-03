<?php
$weekdays = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');

// Table Structure
// habits
// id user_id week name goal category

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

    function displayTracker() {
      global $weekdays;
      foreach ($weekdays as $weekday) {
        echo "<input type='checkbox' class='tracker-toggle' for={$weekday}>";
      }
    }

    // Track clicks and update DB


  }

$Meditate = new Habit('Meditate', 7);
$Exercise = new Habit('Exercise', 4);
$Read = new Habit('Read', 3);

$habits = array($Meditate, $Exercise, $Read);


?>
