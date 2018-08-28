--This file will hold all of the sql code that I wrote for this project 

CREATE TABLE rooms (
    room_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    room_name VARCHAR(30),
);

CREATE TABLE room_reservations (
  reservation_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  room_id INT 
  start_date,
  end_date 
)



INSERT INTO rooms(room_name) 
VALUES('Conf One')

drop table rooms;




