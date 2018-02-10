<?php
  
  //Declaring original number 
  $number = 4;

  //Creating a line break for neater code
  echo '<br>';

  //displaying original number to the browser
  echo 'Original Number: ' . $number . '<br>';

  //Creating a line break for neater code
  echo '<br>';

  //Creating a for loop to increment by one. This loop will add the original number against itself
  //4 times 
  for ($i = 1; $i < 5; $i++){
    $number = $number + 4;
    echo 'Number added against itself ' . $i . ' Times is: ' . $number . '<br>';
  }
  

?>
<!DOCTYPE html>
<html>
<head>
  <title>Chap One Example</title>
  <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>



</body>
</html>