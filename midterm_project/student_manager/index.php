<?php
//This file will act as the controller for my midterm PHP project

//Pulling in the databases
require('../model/database.php');
require('../model/student_db.php');

//Setting a default action 
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_students';
    }
}

//Conditional statement for all of the actions 
if ($action == 'list_students') {
    $students = get_all_students();
    include('student_list.php');
}else if ($action == 'show_add_student_form'){
    include('add_student.php');
}else if ($action == 'add_student'){

  //Getting the values from the user input for a new student 
  $student_name = filter_input(INPUT_POST, 'student_name');
  $student_grade = filter_input(INPUT_POST, 'student_grade');

  //Getting the letter grade based on the student number grade => $student_grade value
  if ($student_grade >= 90) {
    $letter_grade = 'A';
  }else if ($student_grade >= 80 AND $student_grade < 90) {
    $letter_grade = 'B';
  }else if ($student_grade >= 70 AND $student_grade < 80) {
    $letter_grade = 'C';
  }else if ($student_grade >= 60 AND $student_grade < 70) {
    $letter_grade = 'D';
  }else {
    $letter_grade = 'F';
  }

  //Adding the data to the database
  add_student($student_name, $student_grade, $letter_grade);

  //Redirecting the site back to the list students page.
  header('Location: .?action=list_students');
}else if ($action == 'delete_student') {

  //Getting the studentID, which is a primary key, when the user pushes the delete key.
  $studentID = filter_input(INPUT_POST, 'studentID', 
        FILTER_VALIDATE_INT);
  
  //Calling the delete student function to delete the particular student
  delete_student($studentID);

  //Redirecting the site back to the list students page.
  header('Location: .?action=list_students');
}
?>