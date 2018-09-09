--This file will contain all of the SQL code that I used for this project 

CREATE TABLE users (
  user_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  userName VARCHAR(45) NOT NULL,
  password VARCHAR(255) NOT NULL
);

CREATE TABLE comments (
  comment_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  comment VARCHAR(255) NOT NULL, 
  user_id INT NOT NULL, 
  created DATETIME NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users(user_id)
    ON DELETE CASCADE
);

CREATE TABLE replies (
  reply_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  reply VARCHAR(255) NOT NULL, 
  user_id INT NOT NULL, 
  comment_id INT NOT NULL, 
  created DATETIME NOT NULL,
  FOREIGN KEY (user_Id) REFERENCES users(user_id)
    ON DELETE CASCADE,
  FOREIGN KEY (comment_id) REFERENCES comments(comment_id)
    ON DELETE CASCADE
);


--Use NOW() to insert for current date time. 

SELECT c.comment, c.created, r.reply, r.created, c.comment_id
FROM comments c 
JOIN replies r on r.comment_id = c.comment_id
WHERE c.comment_id = 1;