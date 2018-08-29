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
    //This case will take the user to the add room form 
    case 'add_room_form':
      include('add_room.php');
      break;
    //This case will actually add the new room to the database 
    case 'add_room':

      //Getting the user input 
      $room_name  = filter_input(INPUT_POST, 'room_name');

      //Calling the function to add the room
      add_room($room_name);

      header('Location: .?action=list_rooms');
      break;
    //This case will delete a room 
    case 'delete_room':

      //Getting the room id when the user pushed the delete key
      $room_id = filter_input(INPUT_POST, 'room_id', 
            FILTER_VALIDATE_INT);

      //Calling the delete room function
      delete_room($room_id);

      //Redirecting the site back to the list rooms page.
      header('Location: .?action=list_rooms');
      break;
    //This case will take the user to the reservation page
    case 'make_reservation_form':
      include('reservation_page.php');
      break;
    //This case will make the reservation
    case 'make_reservation':
      //Getting the from date data 
      $year_from = filter_input(INPUT_POST, 'year_from');
      $month_from = filter_input(INPUT_POST, 'month_from');
      $day_from = filter_input(INPUT_POST, 'day_from');
      $time_from = filter_input(INPUT_POST, 'time_from');

      //Getting the to date data
      $year_to = filter_input(INPUT_POST, 'year_to');
      $month_to = filter_input(INPUT_POST, 'month_to');
      $day_to = filter_input(INPUT_POST, 'day_to');
      $time_to = filter_input(INPUT_POST, 'time_to');

      //creating from data time stamps 
      $from_date = $year_from . '-' . $month_from . '-' . $day_from . ' ' . $time_from;
      $to_date = $year_to . '-' . $month_to . '-' . $day_to . ' ' . $time_to;

      

      header('Location: .?action=list_rooms');
      break;
}