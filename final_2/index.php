<!-- have to include this link to get the css to apply to this file -->
<link rel="stylesheet" type="text/css" href="./assets/css/generic.css">
<link rel="stylesheet" type="text/css" href="./assets/css/landing.css">
<?php

  // Start the session
  session_start();

?>

<!-- Start of the main section -->
<main class='landing_main' role='main'>
  <div class='landing_div'>

    <form>
      <input placeholder='username' type="text" name='username' required>
      <input placeholder='password' type="text" name='password' required>
      <button type="submit">Login</button>
    </form>
    <a href="signup.php">Sign Up</a>

  </div>
</main>
<!-- End of the main section -->

<?php 
  

  // $password = 'Mike';
  // $hash = password_hash($password, PASSWORD_DEFAULT);

  // echo $password . ' ' . $hash;



?>