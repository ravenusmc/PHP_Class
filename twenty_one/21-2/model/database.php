<?php

  $dsn = 'mysql:host=localhost;dbname=mikcud_ei';
  $username = 'mikcud_ei';
  $password = 'w7qvqjy6';


  try {
      $db = new PDO($dsn, $username, $password, $options);
      $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
      $error = $e->getMessage();
      include('view/error.php');
      exit();
  }
  
?>