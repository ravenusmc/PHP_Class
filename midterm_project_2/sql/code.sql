--This file will hold all of the sql code that I wrote for this project 

CREATE TABLE rooms (
    room_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    room_name VARCHAR(30),
);

CREATE TABLE room_reservations (
  reservation_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  room_id INT NOT NULL, 
  start_date DATETIME NOT NULL,
  end_date DATETIME NOT NULL,
  FOREIGN KEY (room_id) REFERENCES rooms(room_id)
  ON DELETE CASCADE
);



-- INSERT INTO rooms(room_name) 
-- VALUES('Conf One')

-- drop table rooms;




