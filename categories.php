<?php
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