<?php
  
  //This function will get a query from the database of all the students 
  //It will then return that query so that the student_list page may 
  //display all of the students. 
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

  //This function will add a student to the database.
  function add_student($student_name, $student_grade, $letter_grade) {
      global $db;
      $query = 'INSERT INTO students
                  (student_name, student_grade, letter_grade)
                VALUES
                  (:student_name, :student_grade, :letter_grade)';
      $statement = $db->prepare($query);
      $statement->bindValue(':student_name', $student_name);
      $statement->bindValue(':student_grade', $student_grade);
      $statement->bindValue(':letter_grade', $letter_grade);
      $statement->execute();
      $statement->closeCursor();
  }

  //This function deletes a student from the database. 
  function delete_student($studentID) {
      global $db;
      $query = 'DELETE FROM students 
                WHERE studentID = :studentID';
      $statement = $db->prepare($query);
      $statement->bindValue(':studentID', $studentID);
      $statement->execute();
      $statement->closeCursor();
  }
?>