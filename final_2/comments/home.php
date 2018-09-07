<?php
  session_start();

  $name = $_SESSION["username"];

  echo "Your name is: " . $_SESSION["username"];

  // if (isset($name)) {
  //  echo 'Session';
  // }else{
  //  echo 'No Session';
  // }
 
?>
<h1>Hi</h1>
<a href="logout.php">LogOut</a>

<?php if (isset($name)): ?>
  <h1>Comment!</h1>
<?php endif; ?>
