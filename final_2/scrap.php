<?php

  //Old PHP code will be kept in this file. 
  // $name = $_SESSION["username"];
  // $id = $_SESSION["user_id"];

  // echo "Your name is: " . $_SESSION["user_id"];;

  // if (isset($name)) {
  //  echo 'Session';
  // }else{
  //  echo 'No Session';
  // }


?>


<!-- <div class='center'>
  <h1>Welcome to Comments <?php echo $name; ?>!</h1>
  <h3>Write what's on your mind. See what others think.</h3>
  <h4>
    <?php if (isset($name)): ?>
      <p>Join the conversation <?php echo $name; ?>!</p>
      <a class='add_comment_anchor' href="?action=add_comment_form">Add A Comment</a>
    <?php else: ?>
      <p>Sign Up to join the Conversation!</p>
    <?php endif; ?>
  </h4>
</div> -->

  <div class="demo-card-wide mdl-card mdl-shadow--2dp">
    <div class="mdl-card__title">
      <h2 class="mdl-card__title-text">Comment</h2>
    </div>
    <div class="mdl-card__supporting-text">
      <h3><?php echo $comment['userName']; ?> says: <?php echo $comment['comment']; ?></h3>
    </div>
    <div class="mdl-card__actions mdl-card--border">
      <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
        <p>On: <?php echo $comment['created']; ?></p>
      <form action="index.php" method="post">
        <input class='see_form' type="hidden" name="action" value="comment_page" />
        <input class='see_form' type='hidden' name="comment_id" value='<?php echo $comment['comment_id']; ?>'>
        <input class='see_form' type="submit" value="See Replies" />
      </form>
      </a>
    </div>
  </div>