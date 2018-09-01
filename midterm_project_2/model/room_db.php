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

  //This function will make a room reservation on the room reservation table 
  function make_reservation($room_id, $from_date, $to_date) {
    global $db;
    $query = 'INSERT INTO room_reservations
                  (room_id, start_date, end_date)
                VALUES
                  (:room_id, :start_date, :end_date)';
    $statement = $db->prepare($query);
    $statement->bindValue(':room_id', $room_id);
    $statement->bindValue(':start_date', $from_date);
    $statement->bindValue(':end_date', $to_date);
    $statement->execute();
    $statement->closeCursor();
  }

  //This function will get all the room reservations 
  function get_all_reservations() {
    global $db;
    $query = 'SELECT ro.room_name, re.reservation_id, start_date, end_date
    FROM rooms ro
    JOIN room_reservations re on re.room_id = ro.room_id
    ORDER BY re.start_date ASC';
    $statement = $db->prepare($query);
    $statement->execute();
    $all_reservations = $statement->fetchAll();
    $statement->closeCursor();
    return $all_reservations;

  }

  //This function will delete the room reservation 
  function delete_reservation($reservation_id) {
    global $db;
    $query = 'DELETE FROM room_reservations
              WHERE reservation_id = :reservation_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':reservation_id', $reservation_id);
    $statement->execute();
    $statement->closeCursor();
  }

  function date_check($room_id, $from_date, $to_date) {
    global $db; 
    $query = 'SELECT * FROM room_reservations
    WHERE room_id = :room_id AND 
    start_date <= :from_date AND 
    end_date >= :to_date';
    $statement = $db->prepare($query);
    $statement->bindValue(':room_id', $room_id);
    $statement->bindValue(':from_date', $from_date);
    $statement->bindValue(':to_date', $to_date);
    $statement->execute();
    $all_times = $statement->fetchAll();
    $statement->closeCursor();
    return $all_times;
  }





?>