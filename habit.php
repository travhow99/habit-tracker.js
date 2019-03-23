<?php
// Establish Habits class
// Each Habits obj should
  // have name
  // Have set number/week
  // Allow for removal
  // Have a category
  // Allow for changing of category

  class Habit {

    function setName($name) {
      $this->name = $name;
    }

    function setGoal($goal) {
      $this->goal = $goal;
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
      echo $this->name ." <br/>";
    }

  }

$Meditate = new Habit();
$Meditate->setName('Meditate');
$Exercise = new Habit();
$Exercise->setName('Exercise');
$Read = new Habit();
$Read->setName('Read');




?>
