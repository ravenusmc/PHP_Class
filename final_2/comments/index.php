<?php

  //Pulling in the databases
  require('../model/database.php');
  require('../model/helpers.php');

  //Setting a default action 
  $action = filter_input(INPUT_POST, 'action');
  if ($action == NULL) {
      $action = filter_input(INPUT_GET, 'action');
      if ($action == NULL) {
          $action = 'home';
      }
  }

  //Switch statment to determine which page to go to. 
  switch ($action) {

    //This case will bring the user to the page that shows all of the prisoners
    case 'home':
      $comments = get_all_comments();
      include('home.php');
      break;
    //This case will allow the user to go to the add a comment form
    case 'add_comment_form':
      include('add_comment_form.php');
      break;
    //This case will actually add a comment to the database
    case 'add_comment':
      //Getting the user input 
      $comment  = filter_input(INPUT_POST, 'comment');
      $user_id = filter_input(INPUT_POST, 'user_id');
      //Getting the current time to insert into the database.
      date_default_timezone_set('US/Eastern');
      $today = date("m-d-y G:i:s");

      insert_comment($user_id, $comment, $today);

      header('Location: .?action=home');
      break;
  }

?>