<?php
  session_start();
  //This variable will be a flag to verify if the user is currently in a session
  //or just browsing. 
  $name = $_SESSION["username"];
  $id = $_SESSION["user_id"];
  $navbar = True;
 
?>
<?php include '../view/header.php'; ?>

<h1>Add Comment</h1>

<!-- Start of main section -->
<main>

  <section>

    <!-- Start of form -->
    <form action="index.php" method="post">

      <input type="hidden" name="action" value="add_comment" />
      <input type='hidden' name="user_id" value='<?php echo $id; ?>'>

      <textarea placeholder='Comment' type='textarea' rows="4" cols="50" name='comment' required>&nbsp;
      </textarea>

      <input type="submit" value="Add Comment" />

    </form>
    <!-- End of form -->

  </section>

</main>
<!-- End of Main section -->
