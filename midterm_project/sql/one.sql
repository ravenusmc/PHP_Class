--The code in this file will be the SQL scripts that I used to create my table. 

CREATE TABLE students 
(
  studentID INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
  student_name varchar(100),
  student_grade INT,
  letter_grade varchar(10)
);

INSERT INTO students (student_name, student_grade, letter_grade)
VALUES ('Tim Mullen', 98, 'A');




--The table should include 2 columns; student_name and student_grade (number from 0 - 100).