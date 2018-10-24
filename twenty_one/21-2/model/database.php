<?php

  $dsn = 'mysql:host=localhost;dbname=my_guitar_shop2';
  $username = 'root';
  $password = 'root';


  try {
      $db = new PDO($dsn, $username, $password, $options);
      $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
      $error = $e->getMessage();
      include('view/error.php');
      exit();
  }
  
?>