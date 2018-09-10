<?php
  session_start();
  //This variable will be a flag to verify if the user is currently in a session
  //or just browsing. 
  $name = $_SESSION["username"];
  $id = $_SESSION["user_id"];
 
?>
<h1>Update Reply</h1>

<form action="index.php" method="post">

  <input type="hidden" name="action" value="update_reply" />

  <input type='hidden' name="user_id" value='<?php echo $id; ?>'>
  <input type='hidden' name="reply_id" value='<?php echo $reply['reply_id']; ?>'>
  <input type='hidden' name="comment_id" value='<?php echo $reply['comment_id']; ?>'>
  <input name="reply" value='<?php echo $reply['reply']; ?>'>

<!--   <textarea placeholder='Test' type='textarea' rows="4" cols="50" name='comment' required>&nbsp;
  </textarea> -->

  <input type="submit" value="Update Reply" />

</form>