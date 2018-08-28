<?php 


  //This function will get a query from the database of all the criminals 
  //It will then return that query so that the criminal_list page may 
  //display all of the criminals.
  function get_all_rooms(){
    global $db;
    $query = 'SELECT * FROM rooms
            ORDER BY room_id';
    $statement = $db->prepare($query);
    $statement->execute();
    $rooms = $statement->fetchAll();
    $statement->closeCursor();
    return $rooms; 
  }





?>