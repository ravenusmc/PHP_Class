<?php
  session_start();
 
?>
<h1>Hi</h1>
<a href="logout.php">LogOut</a>

<?php if (isset($name)): ?>
  <h1>Comment!</h1>
<?php endif; ?>
