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
    //This case will allow the user to add new replies to a comment
    case 'add_reply':

      //Getting the user input 
      $reply  = filter_input(INPUT_POST, 'reply');
      $user_id = filter_input(INPUT_POST, 'user_id');
      $comment_id = filter_input(INPUT_POST, 'comment_id');

      //Getting the current time to insert into the database.
      date_default_timezone_set('US/Eastern');
      $today = date("m-d-y G:i:s");

      create_reply($reply, $user_id, $comment_id, $today);

      header('Location: .?action=home');
      break;
    //This case will bring the user to the individual comment page 
    case 'comment_page':
      //Getting user input 
      $comment_id = filter_input(INPUT_POST, 'comment_id');

      $comment = get_single_comment($comment_id);
      $comments = get_both_comments_replies($comment_id);

      include('see_comment_page.php');
      break;
  }

?>