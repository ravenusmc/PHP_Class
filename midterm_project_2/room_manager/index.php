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
    case 'make_reservation':
      include('reservation_page.php');
      break;
}