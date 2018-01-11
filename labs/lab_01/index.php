<?php
  
  //Declaring variables
  $full_name = 'Mike Cuddy';
  $number = '603-930-2375';
  $email = 'mcuddy77@gmail.com';

?>

<!DOCTYPE html>
<html>
<head>
  <title>Chap One Example</title>
  <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>


  <div class='display_info_area'>
    <h1>Lab One Assignment</h1>
    <p>Full Name: <?php echo $full_name ?></p>
    <p>Phone Number: <?php echo $number ?></p>
    <p>Email: <?php echo $email ?></p>
  </div>

</body>
</html>