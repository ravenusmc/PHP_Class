<?php
  require_once('database.php');

  // Get IDs
  $categoryName = filter_input(INPUT_POST, 'name');

  // Add the product to the database
  $query = 'INSERT INTO categories
                 (categoryName)
              VALUES
                 (:categoryName)';
  $statement = $db->prepare($query);
  $statement->bindValue(':categoryName', $categoryName);
  $statement->execute();
  $statement->closeCursor();

  // Display the Category List page
  include('category_list.php');

?>