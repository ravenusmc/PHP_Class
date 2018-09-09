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
    $query = "SELECT * FROM comments";
    $statement = $db->prepare($query);
    $statement->execute();
    $comments = $statement->fetchAll();
    $statement->closeCursor();
    return $comments; 
  }



?>