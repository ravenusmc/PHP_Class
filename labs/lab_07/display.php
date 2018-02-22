<?php

    $num_one = filter_input(INPUT_POST, 'num_one');
    $num_two = filter_input(INPUT_POST, 'num_two');

    if ($num_one == 0 || $num_two == 0){
      $total = 'A number, above zero, must be entered for both lines!!!!';
    }else {
      $total = 0;

      for ($i = 0; $i < $num_two; $i++ ){
        $total = $num_one + $total;
      }
    }





?>
<!DOCTYPE html>
<html>
<head>
  <title>Lab 8 Display</title>
</head>
<body>

  <h1>The first number was: <?php echo $num_one ?></h1>
  <h1>The second number was: <?php echo $num_two ?></h1>

  <h3>
    <?php echo $num_one ?> Times <?php echo $num_two ?> using a loop is:
    <?php echo $total ?>
  </h3>


</body>
</html>