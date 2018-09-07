--This file will contain all of the SQL code that I used for this project 

CREATE TABLE users (
  user_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  userName VARCHAR(45) NOT NULL,
  password VARCHAR(255) NOT NULL
);