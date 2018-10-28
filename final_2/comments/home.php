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

<?php if (isset($name)): ?>
<!-- Start of Bootstrap jumbotron -->
<div class="jumbotron img-fluid">
  <div class='text_background'>
    <h1 class="display-4 center">Welcome to Comments <?php echo $name; ?>!</h1>
    <p class="lead center">Write what's on your mind. See what others think.</p>
    <hr class="my-4">
    <?php if (isset($name)): ?>
      <h1 class='center'>Join the conversation <?php echo $name; ?>!</h1>
      <div class='center'>
        <a class='add_comment_anchor' href="?action=add_comment_form">Add A Comment</a>
      </div>
    <?php else: ?>
      <p class='center'><a class='add_comment_anchor' href="../signup.php">Sign Up to join the Conversation!</a></p>
    <?php endif; ?>
  </div>
</div>
<!-- End of bootstrap jumbotron -->

<h1 class='center'>All Comments</h1>
<h3 class='center'>There are currently <?php echo count($comments); ?>  Comments!</h3>
<h3 class='center'>There are currently <?php echo count($replies); ?> replies!</h3>

<!-- looping through the comments to display each one -->
<div class='card_row'>
<?php foreach ($comments as $comment): ?>

  <div>

    <div class='comment_box_top_div'>

      <div class='comment_box'>

        <h3><?php echo $comment['userName']; ?> says: <?php echo $comment['comment']; ?></h3>
        <p>On: <?php echo $comment['created']; ?></p>

        <div class='button_div'>

          <form action="index.php" method="post">
            <input class='see_form' type="hidden" name="action" value="comment_page" />
            <input class='see_form' type='hidden' name="comment_id" value='<?php echo $comment['comment_id']; ?>'>
            <input class='see_form anchor_style' type="submit" value="See Replies" />
          </form>

          <!-- This conditional statement will only allow logged in users to delete/update comments -->
          <?php if (isset($name)): ?>

            <!-- Form action to delete comment -->
            <form action="index.php" method="post">
              <input class='middle_form' type="hidden" name="action" value="delete_comment" />
              <input class='middle_form' type='hidden' name="comment_id" value='<?php echo $comment['comment_id']; ?>'>
              <input class='middle_form anchor_style' type="submit" value="Delete Comment" />
            </form>
            <!-- End of form to delete comment -->

            <!-- Form action to update comment -->
            <form action="index.php" method="post">
              <input class='see_form' type="hidden" name="action" value="update_comment_form" />
              <input class='see_form' type='hidden' name="user_id" value='<?php echo $id; ?>'>
              <input class='see_form' type='hidden' name="comment_id" value='<?php echo $comment['comment_id']; ?>'>
              <input class='see_form anchor_style' type="submit" value="Update Comment" />
            </form>
            <!-- End of form to updatecomment -->

          </div>

        <?php endif; ?>
        <!-- End of conditional statement -->

      </div>

    </div>

  </div>

<?php endforeach; ?>
<!-- End of loop -->
</div>

<?php else:  ?>

    <div class='not_logged_in_div center'>
      <h1>Please Sign Up!</h1>
      <a class='sign_up_link' href="../signup.php">Sign Up</a>
    </div>

<?php endif; ?>


<?php include '../view/footer.php'; ?>