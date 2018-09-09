<?php
  session_start();
  //This variable will be a flag to verify if the user is currently in a session
  //or just browsing. 
  $name = $_SESSION["username"];
 
?>

<h1>Hi</h1>
<a href="logout.php">LogOut</a>


<h1>Comments!</h1>
<?php foreach ($comments as $comment): ?>
  <p><?php echo $comment['comment']; ?></p>
<?php endforeach; ?>

<?php if (isset($name)): ?>
  <a href="?action=add_comment_form">Add Comment</a>
<?php endif; ?>
