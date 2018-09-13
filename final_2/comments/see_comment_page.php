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

  <div class='top_div'>

    <h1>Comment: <?php echo $comment['comment']; ?></h1>

    <h2>Add a Reply:</h2>

    <?php if (isset($name)): ?>

      <!-- This form will allow the user to add a reply -->
      <form action="index.php" method="post">

        <input type="hidden" name="action" value="add_reply" />
        <input type='hidden' name="user_id" value='<?php echo $comment['user_id']; ?>'>
        <input type='hidden' name="comment_id" value='<?php echo $comment['comment_id']; ?>'>

        <textarea placeholder='Reply' type='textarea' rows="4" cols="50" name='reply' required>&nbsp;
        </textarea>

        <br>

        <div class='input_align'>
          <input class='see_form' type="submit" value="Add Reply" />
        </div>

      </form>
      <!-- End of reply form -->

    <?php endif; ?>

  </div>

  <h2>Replies:</h2>

  <?php foreach ($comments as $comment): ?>

    <p><?php echo $comment['reply']; ?></p>
    <p><?php echo $comment['created']; ?></p>

    <?php if (isset($name)): ?>

    <div class='button_fix'>

      <!-- Form to delete a comment -->
      <form action="index.php" method="post">

        <input type="hidden" name="action" value="delete_reply" />
        <input type='hidden' name="reply_id" value='<?php echo $comment['reply_id']; ?>'>
        <input class='middle_form' type="submit" value="Delete Reply" />

      </form>
      <!-- End of form to delete comment -->

      <!-- Form to edit a comment -->
      <form action="index.php" method="post">

        <input type="hidden" name="action" value="update_reply_form" />
        <input type='hidden' name="reply_id" value='<?php echo $comment['reply_id']; ?>'>
        <input class='see_form' type="submit" value="Update Reply" />

      </form>
      <!-- End of form to edit comment -->

    </div>

    <?php endif; ?>

    <hr>

  <?php endforeach; ?>

<?php include '../view/footer.php'; ?>
