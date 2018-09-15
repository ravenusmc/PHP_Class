<?php
  
  //The methods in this file will be helper functions that will be making calls to the 
  //database. 
  
  //This function will get one user from the database 
  function get_one_user($username, $password){
    global $db;
    $query = "SELECT * FROM users 
            WHERE userName = :username AND 
            password = :password";
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    return $user; 
  }

  //This function will insert a comment into the database 
  function insert_comment($user_id, $comment, $today){
    global $db;
    $query = 'INSERT INTO comments
                  (comment, user_id, created)
                VALUES
                  (:comment, :user_id, :created)';
    $statement = $db->prepare($query);
    $statement->bindValue(':comment', $comment);
    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':created', $today);
    $statement->execute();
    $statement->closeCursor();
  }

  //This function will get all comments
  function get_all_comments() {
    global $db;
    $query = "SELECT c.comment_id, c.comment, c.user_id, c.created, u.userName FROM comments c
              JOIN users u on u.user_id = c.user_id
              ORDER BY created DESC";
    $statement = $db->prepare($query);
    $statement->execute();
    $comments = $statement->fetchAll();
    $statement->closeCursor();
    return $comments; 
  }

  //This function will help to get all the replies 
  function get_all_replies() {
    global $db;
    $query = "SELECT * FROM replies";
    $statement = $db->prepare($query);
    $statement->execute();
    $replies = $statement->fetchAll();
    $statement->closeCursor();
    return $replies; 
  }


  //This function will create a new reply 
  function create_reply($reply, $user_id, $comment_id, $today){
    global $db;
    $query = 'INSERT INTO replies
              (reply, user_id, comment_id, created)
            VALUES
              (:reply, :user_id, :comment_id, :created)';
    $statement = $db->prepare($query);
    $statement->bindValue(':reply', $reply);
    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':comment_id', $comment_id);
    $statement->bindValue(':created', $today);
    $statement->execute();
    $statement->closeCursor();
  }

  //This function will get one comment 
  function get_single_comment($comment_id) {
    global $db;
    $query = 'SELECT * FROM comments 
              WHERE comment_id = :comment_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':comment_id', $comment_id);
    $statement->execute();
    $comment = $statement->fetch();
    $statement->closeCursor();
    return $comment;
  }

  //This function will get one reply 
  function get_single_reply($reply_id){
    global $db;
    $query = 'SELECT * FROM replies 
              WHERE reply_id = :reply_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':reply_id', $reply_id);
    $statement->execute();
    $reply = $statement->fetch();
    $statement->closeCursor();
    return $reply;
  }

  //This function will get comments and replies 
  function get_both_comments_replies($comment_id) {
    global $db;
    $query = 'SELECT c.comment, c.created, r.reply, r.created, c.comment_id, r.reply_id, u.userName
              FROM comments c 
              JOIN replies r on r.comment_id = c.comment_id
              JOIN users u on r.user_id = u.user_id
              WHERE c.comment_id = :comment_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':comment_id', $comment_id);
    $statement->execute();
    $replies = $statement->fetchAll();
    $statement->closeCursor();
    return $replies;
  }

  //This function will delete a comment 
  function delete_comment($comment_id) {
    global $db;
    $query = 'DELETE FROM comments
              WHERE comment_id = :comment_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':comment_id', $comment_id);
    $statement->execute();
    $statement->closeCursor();
  }

  //This function will delete a reply 
  function delete_reply($reply_id){
    global $db;
    $query = 'DELETE FROM replies
              WHERE reply_id = :reply_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':reply_id', $reply_id);
    $statement->execute();
    $statement->closeCursor();
  }

  //This function will update a comment 
  function update_comment($comment_id, $comment, $user_id, $today){
    global $db;
    $query = 'UPDATE comments
    SET comment_id = :comment_id,
        comment = :comment,
        user_id = :user_id,
        created = :created
    WHERE comment_id = :comment_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':comment_id', $comment_id);
    $statement->bindValue(':comment', $comment);
    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':created', $today);
    $statement->execute();
    $statement->closeCursor();
  }

  //This function will update a reply 
  function update_reply($reply_id, $reply, $user_id, $comment_id, $today){
    global $db;
    $query = 'UPDATE replies
    SET reply_id = :reply_id,
        reply = :reply,
        user_id = :user_id,
        comment_id = :comment_id, 
        created = :created
    WHERE reply_id = :reply_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':reply_id', $reply_id);
    $statement->bindValue(':reply', $reply);
    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':comment_id', $comment_id);
    $statement->bindValue(':created', $today);
    $statement->execute();
    $statement->closeCursor();
  }

  //This function gets all the comments from the comments table 
  function get_total_comments(){
    global $db;
    $query = 'SELECT count(*) FROM comments';
    $statement = $db->prepare($query);
    $statement->execute();
    // $comments = $statement->fetchAll();
    $total_comments = $statement->rowCount();
    $statement->closeCursor();
    return $total_comments;
  }

  //This function gets all the replies from replies table 
  function get_total_replies(){
    global $db;
    $query = 'SELECT count(*) FROM replies';
    $statement = $db->prepare($query);
    $statement->execute();
    $total_replies = $statement->fetchAll();
    $total_replies = $statement->rowCount();
    $statement->closeCursor();
    return $total_replies;
  }

?>