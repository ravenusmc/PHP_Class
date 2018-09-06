<?php

  // Start the session
  session_start();

  //Pulling in the databases
  require('./model/database.php');
  global $db;

  $message = "";

  if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');

    

    $query = "SELECT * FROM users WHERE 
            userName = :username AND password = :password";
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $count = $statement->rowCount();
    if ($count > 0){
      $_session["username"] = $username;
      // include 'login_success.php';
      // header("Location: /url/to/the/other/page");
      header("location: login_success.php");
      exit();
    }else {
      $message = '<label>Username or Password is Wrong!</label>';
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
    //     echo 'hi';
    //     include('login_success.php');
    //     // header("location:login_success.php");
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
    <?php 
      if (isset($message)){
        echo $message;
      }
    ?>
    <form method="post">
      <input placeholder='username' type="text" name='username' required>
      <input placeholder='password' type="text" name='password' required>
      <button type="submit">Login</button>
    </form>
    <a href="signup.php">Sign Up</a>
    <a href="logout.php">LogOut</a>

  </div>
</main>
<!-- End of the main section -->

<?php 
  

  // $password = 'Mike';
  // $hash = password_hash($password, PASSWORD_DEFAULT);

  // echo $password . ' ' . $hash;

?>