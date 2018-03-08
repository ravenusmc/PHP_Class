<?php

  $one = "Now is the time"; 
  $two = "for all good citizens";
  $three = "to come to the aid of their country.";

  $one_array = explode(' ', $one);
  $two_array = explode(' ', $two);
  $three_array = explode(' ', $three);

  $pos_one = strpos($one, 'is');
  $pos_two = strpos($two, 'all');
  $pos_three = strpos($three, 'come');

  $full_string = $one . ' ' . $two . ' ' . $three;
  
  $real_one = "Now is the time";
  $real_two = "for all good men";
  $real_three = "to come to the aid of the party"; 

  $one_cmp = strcmp($one, $real_one);
  $two_cmp = strcmp($two, $real_two);
  $three_cmp = strcmp($three, $real_three);



?>
<!DOCTYPE html>
<html>
<head>
  <title>Lab 9</title>
</head>
<body>

  <h1>One:</h1>

  <p>String One is: <?php echo $one; ?>. The length is: <?php echo strlen($one) ?></p>
  <p>String Two is: <?php echo $two; ?>. The length is: <?php echo strlen($two) ?></p>
  <p>String Three is: <?php echo $three; ?>. The length is: <?php echo strlen($three) ?></p>

  <hr>

  <h1>Two:</h1>

  <p>The second word in the first string: <?php echo $one_array[1]; ?>.</p>
  <p>The second word in the second string: <?php echo $two_array[1]; ?>.</p>
  <p>The second word in the third string: <?php echo $three_array[1]; ?></p>

  <p>The position of the second word in first string is: <?php echo $pos_one; ?></p>
  <p>The position of the second word in second string is: <?php echo $pos_two; ?></p>
  <p>The position of the second word in third string is: <?php echo $pos_three; ?></p>

  <hr>

  <h1>Three:</h1>

  <p>The full string is: <?php echo $full_string ?></p>
  <p>The length of the string is: <?php echo strlen($full_string) ?></p>

  <hr>

  <h1>Four:</h1>

  <p>The first statement compared to the first real statement returned a value of: <?php echo $one_cmp ?></p>
  <p>The first statement compared to the first real statement returned a value of: <?php echo $two_cmp ?></p>
  <p>The first statement compared to the first real statement returned a value of: <?php echo $three_cmp ?></p>


</body>
</html>