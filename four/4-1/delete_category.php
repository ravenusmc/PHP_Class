<?php
  
  require_once('database.php');

  //Get Category 
  $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);


  // Delete the product from the database
  $query = 'DELETE FROM categories
              WHERE categoryID = :categoryID';
  $statement = $db->prepare($query);
  $statement->bindValue(':categoryID', $category_id);
  $success = $statement->execute();
  $statement->closeCursor();   

  // Display the Product List page
  include('category_list.php');


?>