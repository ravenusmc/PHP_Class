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
<link rel="stylesheet" type="text/css" href="../assets/css/update_comment.css">

<div class='wrapper'>

  <!-- Start of main section -->
  <main>

    <section>

      <h1 class='center'>Add Comment</h1>

      <!-- Start of form -->
      <form action="index.php" method="post">

        <input type="hidden" name="action" value="add_comment" />
        <input type='hidden' name="user_id" value='<?php echo $id; ?>'>

        <textarea placeholder='Comment' type='textarea' rows="4" cols="50" name='comment' required>&nbsp;
        </textarea>

        <br>

        <div class='input_align'>
          <input class='center middle_form' type="submit" value="Add Comment" />
        </div>

      </form>
      <!-- End of form -->

    </section>

  </main>
  <!-- End of Main section -->

</div>
