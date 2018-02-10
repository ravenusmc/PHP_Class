<?php
  
  function get_all_students() {
      global $db;
      $query = 'SELECT * FROM students
              ORDER BY studentID';
      $statement = $db->prepare($query);
      $statement->execute();
      $students = $statement->fetchAll();
      $statement->closeCursor();
      return $students; 
  }


?>