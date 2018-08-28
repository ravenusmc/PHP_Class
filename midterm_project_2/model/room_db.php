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


  //This function adds a room to the rooms table
  function add_room($room_name) {
    global $db;
    $query = 'INSERT INTO rooms
                  (room_name)
                VALUES
                  (:room_name)';
      $statement = $db->prepare($query);
      $statement->bindValue(':room_name', $room_name);
      $statement->execute();
      $statement->closeCursor();
  }


  //This function will delete a room from the rooms table. 
  function delete_room($room_id){
    global $db;
    $query = 'DELETE FROM rooms
              WHERE room_id = :room_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':room_id', $room_id);
    $statement->execute();
    $statement->closeCursor();
  }





?>