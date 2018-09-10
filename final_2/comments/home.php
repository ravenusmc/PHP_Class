<?php
  session_start();
  //This variable will be a flag to verify if the user is currently in a session
  //or just browsing. 
  $name = $_SESSION["username"];
  $id = $_SESSION["user_id"];
 
?>

<h1>Hi <?php echo $name; ?>!</h1>
<a href="logout.php">LogOut</a>


<h1>Comments!</h1>
<?php foreach ($comments as $comment): ?>

  <h3><?php echo $comment['userName']; ?> Says:</h3>
  <p><?php echo $comment['comment']; ?></p>
  <p><?php echo $comment['created']; ?></p>
  <form action="index.php" method="post">

    <input type="hidden" name="action" value="comment_page" />
    <input type='hidden' name="comment_id" value='<?php echo $comment['comment_id']; ?>'>
    <input type="submit" value="See Replies" />

  </form>
  <?php if (isset($name)): ?>

    <!-- Form action to delete comment -->
    <form action="index.php" method="post">
      <input type="hidden" name="action" value="delete_comment" />
      <input type='hidden' name="comment_id" value='<?php echo $comment['comment_id']; ?>'>
      <input type="submit" value="Delete Comment" />
    </form>
    <!-- End of form to delete comment -->

    <!-- Form action to update comment -->
    <form action="index.php" method="post">
      <input type="hidden" name="action" value="update_comment_form" />
      <input type='hidden' name="user_id" value='<?php echo $id; ?>'>
      <input type='hidden' name="comment_id" value='<?php echo $comment['comment_id']; ?>'>
      <input type="submit" value="Update Comment" />
    </form>
    <!-- End of form to updatecomment -->

  <?php endif; ?>

  <hr>

<?php endforeach; ?>

<br>

<?php if (isset($name)): ?>
  <a href="?action=add_comment_form">Add Comment</a>
<?php endif; ?>
