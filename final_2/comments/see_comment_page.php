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
<link rel="stylesheet" type="text/css" href="../assets/css/see_comment.css">

<div class='wrapper'>

  <!-- This div will deal with the area for a user to a reply -->
  <div class='top_div'>

    <h1 class='font'>Comment: <?php echo $comment['comment']; ?></h1>

    <h2 class='font center'>Add a Reply:</h2>

    <?php if (isset($name)): ?>

      <!-- This form will allow the user to add a reply -->
      <form action="index.php" method="post">

        <input type="hidden" name="action" value="add_reply" />
        <input type='hidden' name="user_id" value='<?php echo $id; ?>'>
        <input type='hidden' name="comment_id" value='<?php echo $comment['comment_id']; ?>'>

        <div class='input_align'>
          <textarea placeholder='Reply' type='textarea' rows="4" cols="50" name='reply' required>&nbsp;
          </textarea>
        </div>

        <br>

        <div class='input_align'>
          <input class='see_form anchor_style' type="submit" value="Add Reply" />
        </div>

      </form>
      <!-- End of reply form -->

    <?php endif; ?>

  </div>
  <!-- End of Div area -->

  <h2 class='font'>Replies:</h2>

  <h3 class='font center'>There are currently <?php echo count($replies); ?> replies!</h3>

  <div class='comment_row'>
  <!-- Start of loop to display all replies for each comment -->
  <?php foreach ($replies as $reply): ?>

    <div class='reply_box'>

      <p class='font_2'><?php echo $reply['userName']; ?> Says:</p>
      <p class='font_2'><?php echo $reply['reply']; ?></p>
      <p class='font_2'><?php echo $reply['created']; ?></p>

      <?php if (isset($name)): ?>

      <div class='button_fix'>

        <!-- Form to delete a comment -->
        <form action="index.php" method="post">

          <input type="hidden" name="action" value="delete_reply" />
          <input type='hidden' name="reply_id" value='<?php echo $reply['reply_id']; ?>'>
          <input class='middle_form anchor_style' type="submit" value="Delete Reply" />

        </form>
        <!-- End of form to delete comment -->

        <!-- Form to edit a comment -->
        <form action="index.php" method="post">

          <input type="hidden" name="action" value="update_reply_form" />
          <input type='hidden' name="reply_id" value='<?php echo $reply['reply_id']; ?>'>
          <input class='see_form anchor_style' type="submit" value="Update Reply" />

        </form>
        <!-- End of form to edit comment -->

      </div>

      <?php endif; ?>

    </div>

  <?php endforeach; ?>
  <!-- End of loop to display all replies for each comment -->
  </div>

</div>

<?php include '../view/footer.php'; ?>
