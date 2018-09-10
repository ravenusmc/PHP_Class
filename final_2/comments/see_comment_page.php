<?php
  session_start();
  //This variable will be a flag to verify if the user is currently in a session
  //or just browsing. 
  $name = $_SESSION["username"];
 
?>
<h1>Comment: <?php echo $comment['comment']; ?></h1>

<?php foreach ($comments as $comment): ?>

  <p><?php echo $comment['reply']; ?></p>
  <p><?php echo $comment['created']; ?></p>
  <p><?php echo $comment['reply_id']; ?></p>

  <hr>

<?php endforeach; ?>

