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

<!-- Start of Bootstrap jumbotron -->
<div class="jumbotron img-fluid">
  <div class='text_background'>
    <h1 class="font display-4 center">Welcome to Comments <?php echo $name; ?>!</h1>
    <p class="font lead center">Write what's on your mind. See what others think.</p>
    <hr class="my-4">
    <?php if (isset($name)): ?>
      <h1 class='font center'>Join the conversation <?php echo $name; ?>!</h1>
      <div class='center'>
        <a id='comment_change' class='font add_comment_anchor' href="?action=add_comment_form">Add A Comment</a>
      </div>
    <?php else: ?>
      <p class='center'><a class='add_comment_anchor' href="../signup.php">Sign Up to join the Conversation!</a></p>
    <?php endif; ?>
  </div>
</div>
<!-- End of bootstrap jumbotron -->

<h1 class='font center'>All Comments</h1>
<div class='center'>
  <a id='comment_change_2' class='font add_comment_anchor' href="?action=add_comment_form">Add A Comment</a>
</div>
<h3 class='font center'>There are currently <?php echo count($comments); ?>  Comments!</h3>
<h3 class='font center'>There are currently <?php echo count($replies); ?> replies!</h3>

<!-- looping through the comments to display each one -->
<div class='card_row'>
<?php foreach ($comments as $comment): ?>

  <div>

    <div class='comment_box_top_div'>

      <div class='comment_box'>

        <h3 class='font_2'><?php echo $comment['userName']; ?> says: <?php echo $comment['comment']; ?></h3>
        <p class='font_2'>On: <?php echo $comment['created']; ?></p>

        <div class='button_div'>

          <form action="index.php" method="post">
            <input class='see_form' type="hidden" name="action" value="comment_page" />
            <input class='see_form' type='hidden' name="comment_id" value='<?php echo $comment['comment_id']; ?>'>
            <input class='font_2 see_form anchor_style' type="submit" value="See Replies" />
          </form>

          <!-- This conditional statement will only allow logged in users to delete/update comments -->


            <!-- Form action to delete comment -->
            <form action="index.php" method="post">
              <input class='middle_form' type="hidden" name="action" value="delete_comment" />
              <input class='middle_form' type='hidden' name="comment_id" value='<?php echo $comment['comment_id']; ?>'>
              <?php if (isset($name)): ?>
                <input class='font_2 middle_form anchor_style' type="submit" value="Delete Comment" />
              <?php else:  ?>
                <input type="hidden" class='font_2 middle_form anchor_style' type="submit" value="Delete Comment" />
              <?php endif; ?>
            </form>
            <!-- End of form to delete comment -->

            <!-- Form action to update comment -->
            <form action="index.php" method="post">
              <input class='see_form' type="hidden" name="action" value="update_comment_form" />
              <input class='see_form' type='hidden' name="user_id" value='<?php echo $id; ?>'>
              <input class='see_form' type='hidden' name="comment_id" value='<?php echo $comment['comment_id']; ?>'>
              <?php if (isset($name)): ?>
                <input class='font_2 see_form anchor_style' type="submit" value="Update Comment" />
              <?php else:  ?>
                <input type="hidden" class='font_2 see_form anchor_style' type="submit" value="Update Comment" />
              <?php endif; ?>
            </form>
            <!-- End of form to updatecomment -->

          </div>

        <!-- End of conditional statement -->

      </div>

    </div>

  </div>

<?php endforeach; ?>
<!-- End of loop -->
</div>



<script type="text/javascript" src='../assets/js/home.js'></script>
<?php include '../view/footer.php'; ?>