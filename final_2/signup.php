
<?php

  // Start the session
  session_start();

  //Pulling in the databases
  require('./model/database.php');
  global $db;

  $message = "";

  if (isset($_POST["login"])){

    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');
    $password2 = filter_input(INPUT_POST, 'password2');
    //Hashing the password 
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    $query = "SELECT * FROM users WHERE 
              userName = :username AND 
              password = :password";
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $count = $statement->rowCount();
    if ($count > 0){
      $message = '<label>Username Taken!</label>';
    }else {
      $query = 'INSERT INTO users
                  (userName, password)
                VALUES
                  (:username, :password)'; 
      $statement = $db->prepare($query); 
      $statement->bindValue(':username', $username);
      $statement->bindValue(':password', $password_hashed);
      $statement->execute();
      $statement->closeCursor(); 

    }



    // if (empty($_POST["username"]) || empty($_POST["password"])){
    //   $message = '<label>All Fields are required</label>';
    // }else {
    //   $query = "SELECT * FROM users WHERE username = :username AND password = :password";
    //   $statement = $connect->prepare($query);
    //   $statement->bindValue(':username', $username);
    //   $statement->bindValue(':password', $password);
    //   $statement->execute();
    //   $count = $statement->rowCount();
    //   if ($count > 0){
    //     $_session["username"] = $username;
    //     header("location:login_success.php");
    //   }else {
    //     $message = '<label>Wrong Data</label>';
    //   }
    // }

  }

?>
<!-- have to include this link to get the css to apply to this file -->
<link rel="stylesheet" type="text/css" href="./assets/css/generic.css">
<link rel="stylesheet" type="text/css" href="./assets/css/landing.css">

<!-- Start of the main section -->
<main class='landing_main' role='main'>
  <div class='landing_div'>
    <h2>Sign Up</h2>
    <?php 
      if (isset($message)){
        echo $message;
      }
    ?>
    <form method="post">
      <input placeholder='Username' type="text" name='username' required>
      <input class="<?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>" placeholder='Password' type="text" name='password' required>
      <input placeholder='Confirm Password' type="text" name='password2' required>
      <span><?php echo $confirm_password_err; ?></span>
      <input type="submit" name="login" value="Submit">
    </form>
    <a href="index.php">Login Page</a>

  </div>
</main>
<!-- End of the main section -->


























