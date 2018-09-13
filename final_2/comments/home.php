<?php
  session_start();
  //This variable will be a flag to verify if the user is currently in a session
  //or just browsing. 
  $name = $_SESSION["username"];
  $id = $_SESSION["user_id"];

  $navbar = True;
 
?>
<?php include '../view/header.php'; ?>
<link rel="stylesheet" type="text/css" href="../assets/css/generic.css">
<link rel="stylesheet" type="text/css" href="../assets/css/home.css">

<div class='center'>
  <h1>Welcome to Comments <?php echo $name; ?>!</h1>
  <h3>Write what's on your mind. See what others think.</h3>
  <h4>
    <?php if (isset($name)): ?>
      Join the conversation <?php echo $name; ?>!
      <a class='add_comment_anchor' href="?action=add_comment_form">Add A Comment</a>
    <?php else: ?>
      <p>Sign Up to join the Conversation!</p>
    <?php endif; ?>
  </h4>
</div>

<?php foreach ($comments as $comment): ?>

  <div class='comment_box'>

    <h3><?php echo $comment['userName']; ?> Says:</h3>
    <p><?php echo $comment['comment']; ?></p>
    <p><?php echo $comment['created']; ?></p>

    <div class='button_div'>

      <form action="index.php" method="post">
        <input class='see_form' type="hidden" name="action" value="comment_page" />
        <input class='see_form' type='hidden' name="comment_id" value='<?php echo $comment['comment_id']; ?>'>
        <input class='see_form' type="submit" value="See Replies" />
      </form>

      <!-- This conditional statement will only allow logged in users to delete/update comments -->
      <?php if (isset($name)): ?>

        <!-- Form action to delete comment -->
        <form action="index.php" method="post">
          <input class='middle_form' type="hidden" name="action" value="delete_comment" />
          <input class='middle_form' type='hidden' name="comment_id" value='<?php echo $comment['comment_id']; ?>'>
          <input class='middle_form' type="submit" value="Delete Comment" />
        </form>
        <!-- End of form to delete comment -->

        <!-- Form action to update comment -->
        <form action="index.php" method="post">
          <input class='see_form' type="hidden" name="action" value="update_comment_form" />
          <input class='see_form' type='hidden' name="user_id" value='<?php echo $id; ?>'>
          <input class='see_form' type='hidden' name="comment_id" value='<?php echo $comment['comment_id']; ?>'>
          <input class='see_form' type="submit" value="Update Comment" />
        </form>
        <!-- End of form to updatecomment -->

      </div>

    <?php endif; ?>
    <!-- End of conditional statement -->

  </div>

<?php endforeach; ?>

<?php include '../view/footer.php'; ?>