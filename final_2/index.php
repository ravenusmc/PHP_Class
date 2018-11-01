<?php

  // Start the session
  session_start();

  //Pulling in the databases
  require('./model/database.php');
  require('./model/helpers.php');

  global $db;

  $message = "";

  if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');

    //Getting the password from the database 
    $query = "SELECT * FROM users 
              WHERE userName = :username";
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $user = $statement->fetch();
    //Setting the user_table variable to store the passwrod for the verify function
    $user_table_password = $user['password'];
    //Verifing the password from the database.
    $valid_password = password_verify($password, $user_table_password);

    if ($valid_password) {
      $user = get_one_user($username, $user_table_password);
      $_SESSION["username"] = $username;
      $_SESSION["user_id"] = $user['user_id'];
      header("location: comments/index.php");
      exit();
    }else {
      $message = '<label>Password is Wrong!</label>';
    }


  }
?>
<?php include 'view/header.php'; ?>

<!-- have to include this link to get the css to apply to this file -->
<link rel="stylesheet" type="text/css" href="./assets/css/generic.css">
<link rel="stylesheet" type="text/css" href="./assets/css/landing.css">

<div class='wrapper'>

  <!-- Start of the main section -->
  <main class='landing_main' role='main'>

    <div class='landing_div'>
      <h1 class='font center'>Comments</h1>
      <?php 
        if (isset($message)){
          echo $message;
        }
      ?>

      <form method="post">
        <div class="form-group">
          <label class='font' for="exampleInputEmail1">Username</label>
          <input type="text" name='username' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username">
        </div>
        <div class="form-group">
          <label class='font' for="exampleInputPassword1">Password</label>
          <input type="password" name='password' class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <button type="submit" class="font btn btn-primary">Submit</button>
      </form>

      <div class='anchor_div'>
        <a class='font' href="signup.php">Sign Up</a>
        <a class='font' href="comments">Go In</a>
      </div>

    </div>

  </main>
  <!-- End of the main section -->

</div>
