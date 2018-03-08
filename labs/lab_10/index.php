<?php

//Getting the current date
$now = time();
$date = date('Y-m-d g:i:s a', $now);

//Adding one month to the date function
$time = strtotime($date);
$final = date("Y-m-d g:i:s a", strtotime("+1 month", $time));

///////////////////////////////////////////////////////

//using DateTime object to display current date and time

//Setting the format of how I want the output to look. I changed it up from above taken code from 10-1. 
$time_format = 'F j, Y';
//Creating the object using the DateTime class
$now_object = new DateTime();
$now_object_time = $now_object->format($time_format);

//Add one year to the DateTime Object
$add_year = new DateInterval('P1Y');
$year_date = new DateTime();
$year = $year_date->add($add_year);
$year_added = $year->format($time_format);

///////////////////////
$five_now = time();
$five_date = date("Y-m-d");
$five_dateB = date("Y-m-d g:i:s a");
$five_dateC = date("l, F d Y");


?>
<!DOCTYPE <html>
<head>
  <title>LaB 10</title>
</head>
<body>

  <h1>One:</h1>

  <p>The current date and time is: <?php echo $date; ?></p>

  <hr>

  <h1>Two:</h1>

  <p>Here is one month added to the date and time: <?php echo $final; ?> </p>

  <hr>

  <h1>Three:</h1>

  <p>Using the DateTime object, the current date and time is: <?php echo $now_object_time; ?></p>

  <hr>

  <h1>Four:</h1>

  <p>Using the DateTime object, add a year to the current date: <?php echo $year_added; ?></p>

  <hr>

  <h1>Five:</h1>

    <p>5.A: <?php echo $five_date; ?></p>
    <p>5.B: <?php echo $five_dateB ; ?></p>
    <p>5.C: <?php echo $five_dateC ; ?></p>



  



</body>
</html>