<?php
    // get the data from the form
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password');
    $phone = filter_input(INPUT_POST, 'phone');

    // for the heard_from radio buttons,
    // display a value of 'Unknown' if the user doesn't select a radio button
    $heard_about = filter_input(INPUT_POST, 'heard_from');
    if ($heard_about == NULL) {
        $heard_about = 'unknown';
    } 

    // for the wants_updates check box,
    // display a value of 'Yes' or 'No'
    $updates = isset($_POST['wants_updates']);
    if ($updates == 1) {
        $updates = 'Yes';
    }else {
        $updates = 'No';
    }

    //Code for the user getting in contact with the store
    $contact_form = filter_input(INPUT_POST, 'contact_via');

    //Getting the comments from the text area
    $comments = filter_input(INPUT_POST, 'comments');
    //converting the special characters. 
    $comments = htmlspecialchars($comments); 
    $comments = nl2br($comments, false);    

?>
<!DOCTYPE html>
<html>
<head>
    <title>Account Information</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>
<body>
    <main>
        <h1>Account Information</h1>

        <label>Email Address:</label>
        <span><?php echo htmlspecialchars($email); ?></span><br>

        <label>Password:</label>
        <span><?php echo htmlspecialchars($password); ?></span><br>

        <label>Phone Number:</label>
        <span><?php echo htmlspecialchars($phone); ?></span><br>

        <label>Heard From:</label>
        <span><?php echo htmlspecialchars($heard_about); ?></span><br>

        <label>Send Updates:</label>
        <span><?php echo htmlspecialchars($updates); ?></span><br>

        <label>Contact Via:</label>
        <span><?php echo htmlspecialchars($contact_form); ?></span><br><br>

        <span>Comments:</span><br>
        <span><?php echo htmlspecialchars($comments); ?></span><br>        
    </main>
</body>
</html>