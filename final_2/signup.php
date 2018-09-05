<!-- have to include this link to get the css to apply to this file -->
<link rel="stylesheet" type="text/css" href="./assets/css/generic.css">
<link rel="stylesheet" type="text/css" href="./assets/css/landing.css">
<?php

  // Start the session
  // session_start();

  //Pulling in the databases
  require('./model/database.php');
  global $db;

  if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');
    $password2 = filter_input(INPUT_POST, 'password2');

    //Checking to see if passwords do not match
    // $confirm_password = trim($_POST["confirm_password"]);
    //   if(empty($password_err) && ($password != $confirm_password)){
    //       $confirm_password_err = "Password did not match.";
    // }

    // Validate credentials
    if(empty($username_err) && empty($password_err)){
      // Prepare a select statement
      $query = "SELECT user_id, userName, password 
      FROM users WHERE username = :username";
      $statement = $db->prepare($query);
      $statement->bindValue(":username", $username);
      $statement->execute();
      $users = $statement->fetch();
      $test = $statement->rowCount();
      echo $test;
      $statement->closeCursor();
      

      // if($statement = $db->prepare($query)){
      //     //binding variables 
      //     $statement->bindValue(":username", $username);
      //     // Attempt to execute the prepared statement
      //     if($statement->execute()){
      //       // Check if username exists, if yes then verify password
      //       if($statement->rowCount() == 1){
      //         echo 'found';
      //       }else{
      //             // Display an error message if username doesn't exist
      //             $error = "No account found with that username.";
      //             echo $error;
      //         }
      //     }
      // }

    }
  }

?>

<!-- Start of the main section -->
<main class='landing_main' role='main'>
  <div class='landing_div'>
    <h2>Sign Up</h2>
    <form method="post">
      <input placeholder='Username' type="text" name='username' required>
      <input class="<?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>" placeholder='Password' type="text" name='password' required>
      <input placeholder='Confirm Password' type="text" name='password2' required>
      <span><?php echo $confirm_password_err; ?></span>
      <input type="submit" value="Submit">
    </form>
    <a href="index.php">Login Page</a>

  </div>
</main>
<!-- End of the main section -->