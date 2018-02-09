<?php
    // get the data from the form
    $investment = filter_input(INPUT_POST, 'investment', 
            FILTER_VALIDATE_FLOAT);
    $interest_rate = filter_input(INPUT_POST, 'interest_rate', 
            FILTER_VALIDATE_FLOAT);
    $years = filter_input(INPUT_POST, 'years', 
            FILTER_VALIDATE_INT);

    echo 'Initial Entered Values: ' . '<br>';
    echo 'Investment: ' . $investment . '<br>';
    echo 'Interest Rate: ' . $interest_rate . '<br>';
    echo 'Years: ' . $years . '<br>';
    echo 'End of Initial Entered Values. ' . '<br>';
    echo '<br>';
    echo '<br>';

    // validate investment
    if ( $investment === NULL || $investment === FALSE ) {
        echo 'Investment: ' . $investment . '<br>';
        $error_message = 'Investment must be a valid number.'; }
    else if ( $investment <= 0 ) {
        echo 'Investment: ' . $investment . '<br>';
        $error_message = 'Investment must be greater than zero.'; }

    // validate interest rate
    else if ( $interest_rate === NULL || $interest_rate === FALSE ) {
        echo 'Interest Rate: ' . $interest_rate . '<br>';
        $error_message = 'Interest rate must be a valid number.'; }
    else if ( $interest_rate <= 0 ) {
        echo 'Interest Rate: ' . $interest_rate . '<br>';
        $error_message = 'Interest rate must be greater than zero.'; }
        
    // validate years
    else if ( $years === NULL || $years === FALSE ) {
        echo 'Years: ' . $years . '<br>';
        $error_message = 'Number of years must be a valid whole number.'; }
    else if ( $years <= 0 ) {
        echo 'Years: ' . $years . '<br>';
        $error_message = 'Numbr of years must be greater than zero.'; }

    // set error message to empty string if no invalid entries
    else {
        $error_message = ''; }

    // if an error message exists, go to the index page
    if ($error_message != '') {
        include('index.php');
        exit();
    }

    // calculate the future value
    $future_value = $investment;
    echo 'For Loop Values: ' . '<br>';
    for ($i = 1; $i <= $years; $i++) {
        echo 'counter value: ' . $i . '<br>';
        echo 'Future value: ' . $future_value . '<br>';
        echo '<br>';
        $future_value += $future_value * $interest_rate; 
    }

    // apply currency and percent formatting
    $investment_f = '$'.number_format($investment, 2);
    $yearly_rate_f = $interest_rate.'%';
    $future_value_f = '$'.number_format($future_value, 2);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Future Value Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>
<body>
    <main>
        <h1>Future Value Calculator</h1>

        <label>Investment Amount:</label>
        <span><?php echo $investment_f; ?></span><br>

        <label>Yearly Interest Rate:</label>
        <span><?php echo $yearly_rate_f; ?></span><br>

        <label>Number of Years:</label>
        <span><?php echo $years; ?></span><br>

        <label>Future Value:</label>
        <span><?php echo $future_value_f; ?></span><br>
    </main>
</body>
</html>