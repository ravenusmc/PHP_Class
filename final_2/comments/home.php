<?php
  session_start();
  //This variable will be a flag to verify if the user is currently in a session
  //or just browsing. 
  $name = $_SESSION["username"];
 
?>

<h1>Hi <?php echo $name; ?>!</h1>
<a href="logout.php">LogOut</a>


<h1>Comments!</h1>
<?php foreach ($comments as $comment): ?>


  <p><?php echo $comment['comment']; ?></p>
  <form action="index.php" method="post">

    <input type="hidden" name="action" value="comment_page" />
    <input type='hidden' name="comment_id" value='<?php echo $comment['comment_id']; ?>'>

    <input type="submit" value="See Replies" />

  </form>
  <!-- Form action to delete comment -->
  <form action="index.php" method="post">
    <input type="hidden" name="action" value="delete_comment" />
    <input type='hidden' name="comment_id" value='<?php echo $comment['comment_id']; ?>'>
    <input type="submit" value="Delete Comment" />
  </form>
  <!-- End of form to delete comment -->

  <!-- This form will allow the user to add a reply -->
  <form action="index.php" method="post">

    <input type="hidden" name="action" value="add_reply" />
    <input type='hidden' name="user_id" value='<?php echo $comment['user_id']; ?>'>
    <input type='hidden' name="comment_id" value='<?php echo $comment['comment_id']; ?>'>

    <textarea placeholder='Reply' type='textarea' rows="4" cols="50" name='reply' required>&nbsp;
    </textarea>

    <input type="submit" value="Add Reply" />

  </form>
  <!-- End of reply form -->

  <hr>

<?php endforeach; ?>

<br>

<?php if (isset($name)): ?>
  <a href="?action=add_comment_form">Add Comment</a>
<?php endif; ?>
