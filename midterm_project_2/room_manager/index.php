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
      $navbar = True;
      $rooms = get_all_rooms();
      include('room_list.php');
      break;
    //This case will take the user to the add room form 
    case 'add_room_form':
      $navbar = True;
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
      $navbar = True;
      $rooms = get_all_rooms();
      $all_reservations = get_all_reservations();
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

      //Getting the room id number 
      $room_id = filter_input(INPUT_POST, 'room_id');

      //creating from data time stamps 
      $from_date = $year_from . '-' . $month_from . '-' . $day_from . ' ' . $time_from;
      $to_date = $year_to . '-' . $month_to . '-' . $day_to . ' ' . $time_to;

      //Getting the interval from one date to another. 
      $datetime1 = new DateTime($from_date);
      $datetime2 = new DateTime($to_date);
      $interval = $datetime1->diff($datetime2);
      $number_of_days = $interval->format('%a');
      $number_of_days = intval($number_of_days);

      //This checks type. Keeping it here for reference reasons. 
      // echo gettype($number_of_days);

      //Checking to see if the date falls on the weekend 
      $weekend_one = (date('N', strtotime($from_date)) >= 6);
      $weekend_two = (date('N', strtotime($to_date)) >= 6);
      //Checking to ensure that a time does not conflict with another reservation. 
      $matches = date_check($room_id, $from_date, $to_date);
      $duplicate_time = count($matches);

      //Keeping for my future reference. 
      // foreach ($matches as $match){
      //   echo $match['start_date'];
      // }

      //Error checking 
      if ($datetime1 > $datetime2){
        $_SESSION['Error'] = "The second date is earlier than the first date!";
      }else if ($datetime1 == $datetime2){
        $_SESSION['Error'] = "The dates are the same!!";
      }else if ($weekend_one == 1 or $weekend_two == 1){
        $_SESSION['Error'] = "Sorry, that date falls on the weekend!!";
      }else if ($number_of_days > 0){
        $_SESSION['Error'] = "Sorry, the reservation cannot span days";
      }else if ($duplicate_time > 0){
        $_SESSION['Error'] = "Sorry, that time is already taken in that room!";
      }
      else {
        //Calling the make_reseravation function 
        make_reservation($room_id, $from_date, $to_date);
      }

      //Display an error message 
      if( isset($_SESSION['Error']) ) {
              echo "<h1>" . $_SESSION['Error'] . "</h1>";
              unset($_SESSION['Error']);
              echo '<h2>Please hit the back button!</h2>';
      }

      header('Location: .?action=make_reservation_form');
      break;
    //This case will delete a reservation
    case 'delete_reservation':
      //Getting the reservation id when the user pushed the delete key
      $reservation_id = filter_input(INPUT_POST, 'reservation_id', 
            FILTER_VALIDATE_INT);

      //Calling the delete reservation function
      delete_reservation($reservation_id);

      //Redirecting the site back to the list rooms page.
      header('Location: .?action=make_reservation_form');
      break;

}