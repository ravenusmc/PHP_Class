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
      //This function will get all of the comments 
      $comments = get_all_comments();
      //This function will get the number of total comments: 
      $total_comments = get_total_comments();
      // $total_replies = get_total_replies();
      $replies = get_all_replies();

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
      date_default_timezone_set('America/New_York');
      $today = date("Y-m-d G:i:s");

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
      $today = date("Y-m-d G:i:s");

      create_reply($reply, $user_id, $comment_id, $today);

      header('Location: .?action=home');
      break;
    //This case will bring the user to the individual comment page 
    case 'comment_page':
      //Getting user input 
      $comment_id = filter_input(INPUT_POST, 'comment_id');

      $comment = get_single_comment($comment_id);
      $replies = get_both_comments_replies($comment_id);

      include('see_comment_page.php');
      break;
    //This case will allow the user to delete a comment 
    case 'delete_comment':
      //Getting comment id when the user pushes the delete button
      $comment_id = filter_input(INPUT_POST, 'comment_id');

      delete_comment($comment_id);

      header('Location: .?action=home');
      break;
    //This case will allow the user to delete a reply
    case 'delete_reply':
      //Getting the reply id when the user pushes the delete button
      $reply_id = filter_input(INPUT_POST, 'reply_id');

      delete_reply($reply_id);

      header('Location: .?action=home');
      break;
    //This case will allow the user to update a comment form
    case 'update_comment_form':
      $comment_id  = filter_input(INPUT_POST, 'comment_id');
      // $user_id = filter_input(INPUT_POST, 'user_id');
      // $comment_mod = filter_input(INPUT_POST, 'comment');

      //Getting information on current comment
      $comment = get_single_comment($comment_id);

      include('update_comment_form.php');
      break;
    //This case will actually update the comment
    case 'update_comment':
      $comment_id  = filter_input(INPUT_POST, 'comment_id');
      $user_id = filter_input(INPUT_POST, 'user_id');
      $comment = filter_input(INPUT_POST, 'comment');

      //Getting the current time to insert into the database.
      date_default_timezone_set('US/Eastern');
      $today = date("m-d-y G:i:s");

      update_comment($comment_id, $comment, $user_id, $today);

      header('Location: .?action=home');
      break;
    //This case will bring the user to the page to update the form 
    case 'update_reply_form':
      $reply_id = filter_input(INPUT_POST, 'reply_id');

      //Getting information on current reply
      $reply = get_single_reply($reply_id);

      include('update_reply_form.php');
      break;
    //This case will actually update the reply 
    case 'update_reply':
      $reply_id = filter_input(INPUT_POST, 'reply_id');
      $reply = filter_input(INPUT_POST, 'reply');
      $user_id = filter_input(INPUT_POST, 'user_id');
      $comment_id = filter_input(INPUT_POST, 'comment_id');

      //Getting the current time to insert into the database.
      date_default_timezone_set('US/Eastern');
      $today = date("m-d-y G:i:s");

      update_reply($reply_id, $reply, $user_id, $comment_id, $today);

      header('Location: .?action=home');
      break;
  }

?>