
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

    echo $username;

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
<?php include 'view/header.php'; ?>

<!-- have to include this link to get the css to apply to this file -->
<link rel="stylesheet" type="text/css" href="./assets/css/generic.css">
<link rel="stylesheet" type="text/css" href="./assets/css/signup.css">

<div class='wrapper'>

  <!-- Start of the main section -->
  <main class='landing_main' role='main'>

    <div class='landing_div'>
      <h4 class='center'>Sign Up for Comments</h4>
      <?php 
        if (isset($message)){
          echo $message;
        }
      ?>

      <!-- Start of Sign up form -->
      <form method="post">
        <div class="form-group">
          <label for="exampleInputEmail1">Username</label>
          <input type="text" name='username' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" name='password' class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password Confirm</label>
          <input type="password" name='password2' class="form-control" id="exampleInputPassword1" placeholder="Password Confirm">
        </div>
        <div class='center'>
          <button type="submit" name="login" class="btn btn-primary">Submit</button>
        </div>
      </form>
      <!-- End of Sign up form -->

      <div class='login_anchor center'>
        <a href="index.php">Login Page</a>
      </div>

    </div>

  </main>
  <!-- End of the main section -->

</div>


























