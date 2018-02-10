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
}



?>