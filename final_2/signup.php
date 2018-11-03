
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
    }else if ($password != $password2) {
      $message = '<label class="errorMsg">Passwords Do Not Match!</label>';
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
      <h4 class='center font'>Sign Up for Comments</h4>
      <?php 
        if (isset($message)){
          echo $message;
        }
      ?>

      <!-- Start of Sign up form -->
      <form method="post">
        <div class="form-group">
          <label class='font' for="exampleInputEmail1">Username</label>
          <input type="text" name='username' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username" required>
        </div>
        <div class="form-group">
          <label class='font' for="exampleInputPassword1">Password</label>
          <input type="password" name='password' class="form-control" id="exampleInputPassword1" placeholder="Password" required>
        </div>
        <div class="form-group">
          <label class='font' for="exampleInputPassword1">Password Confirm</label>
          <input type="password" name='password2' class="form-control" id="exampleInputPassword1" placeholder="Password Confirm" required>
        </div>
        <div class='center'>
          <button type="submit" name="login" class="font btn btn-primary">Submit</button>
        </div>
      </form>
      <!-- End of Sign up form -->

      <div class='login_anchor center'>
        <a class='font' href="index.php">Login Page</a>
      </div>

    </div>

  </main>
  <!-- End of the main section -->

</div>


























