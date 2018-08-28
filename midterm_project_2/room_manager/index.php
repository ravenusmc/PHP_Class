<?php 
  //This file will act as the controller for the midterm PHP Project 

  //Pulling in the databases
  require('../model/database.php');
  require('../model/room_db.php');
  
  //Setting a default action 
  $action = filter_input(INPUT_POST, 'action');
  if ($action == NULL) {
      $action = filter_input(INPUT_GET, 'action');
      if ($action == NULL) {
          $action = 'list_rooms';
      }
  }

  //Switch statment to determine which page to go to. 
  switch ($action) {

    //This case will bring the user to the page that shows all of the prisoners
    case 'list_rooms':
        $rooms = get_all_rooms();
        include('room_list.php');
        break;

  }