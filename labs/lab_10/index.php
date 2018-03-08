<?php

// 1. Use the date function to display the current date and time.
// 2. Add one month to this date and display.
// 3. Use the DateTime object to display the current date and time.
// 4. Add one year to this date and display.
// 5. Use your favorate function or object to display the current date in the following formats:
//     yyyy/mm/dd
//     mm/dd/yyyy hh:mi:ss am/pm
//     full day name, full month name day, year

$now = time();
$date = date('Y-m-d g:i:s a', $now);



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

  <hr>

  <h1>Three:</h1>

  <hr>


</body>
</html>