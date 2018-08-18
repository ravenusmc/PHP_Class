<?php

  //function for calculating loan
  function loan_calc($loan_amount, $loan_length, $interest_rate) {
    //The math in this line will actually calculate the loan payment 
    $payment = ($interest_rate * ($loan_amount)) / (1 - (1 + $interest_rate) ** -$loan_length );
    return $payment;
  }

  //Converting the interest rate to a percentage 
  function convert_interest($interest_rate) {
    $interest_rate = $interest_rate / 100;
    return $interest_rate;
  }

  //Getting the data from the form
  $loan_amount = filter_input(INPUT_POST, 'loan_amount');
  $loan_length = filter_input(INPUT_POST, 'loan_length');
  $interest_rate = filter_input(INPUT_POST, 'interest_rate');
  $time_span = filter_input(INPUT_POST, 'time_span');

  //Realizing that I display the interest rate modified, I'm creating a variable 
  //That will be a 'constant' for the user rate that is entered. I realized this 
  //after most of my code was written. 
  $original_interest_rate = $interest_rate;

  //Validation to ensure that the user entered all of the information. 
  if (empty($loan_amount)) {
    $message = 'Please fill out the box for the loan amount!';
  }else if (empty($loan_length)) {
    $message = 'Please fill out the box for the loan length!';
  }else if (empty($interest_rate)) {
    $message = 'Please fill out the box for the interest rate';
  }else if ($loan_amount < 0 || !is_numeric($loan_amount)) {
    $message_two = 'Loan Amount Cannot Be Less Than Zero OR must be a number';
  }else if ($interest_rate < 0 || !is_numeric($interest_rate)) {
    $message_two = 'Interest rate Cannot Be Less Than Zero OR must be a number';
  }else if ($loan_length < 0 || !is_numeric($loan_length)) {
    $message_two = 'Loan length Cannot Be Less Than Zero OR must be a number';
  }

  //Converting interest rate to decimal 
  $interest_rate = convert_interest($interest_rate);

  //Getting the right values based on whether the number enter is months or years. 
  if ($time_span == 'months') {
    $interest_rate = $interest_rate / 12;
    $time_num = $loan_length;
  }else if ($time_span == 'years') {
    $time_num = $loan_length;
    $interest_rate = $interest_rate / 12;
    $loan_length = $loan_length * 12;
  }

  //Getting the payment amount 
  $payment = loan_calc($loan_amount, $loan_length, $interest_rate);

  //I create a new variable, based off the $loan amount that will be used in a lot of the 
  //functions to calculate the interest. 
  $balance = $loan_amount;

  //This function will calculate the principal portion of the loan.
  function show_principal($balance, $payment, $interest_rate) {
      $interest = $interest_rate * $balance;
      $principal = $payment - $interest;
      $balance = $balance - $principal; //For some reason this line is not working
      $principal = number_format($principal, 2);
      echo $principal;
      return $balance; 
  } 

  //This function will show the balance as it changes from payment to payment. 
  function show_balance($balance) {

      if ($balance < 0){
        $balance = 0;
        echo number_format($balance,2);
      }else {
        echo number_format($balance,2); 
      }
      
  }

  //This function will show the payments for each month. 
  function payment($payment) {
    $payment = number_format($payment, 2);
    echo $payment;
  }

  //This function will show the interest in the table. 
  function show_interest($balance, $interest_rate) {
    $interest = $interest_rate * $balance;
    $interest = number_format($interest, 2);
    echo $interest;
  }


  $total_interest_balanace = $loan_amount;
  $total_interest = 0;

  //This function will get the total interest.
  function get_total_interest(&$total_interest_balanace, $interest_rate, $total_interest, $payment) {

    $interest = $total_interest_balanace * $interest_rate;
    $principal = $payment - $interest;
    $total_interest_balanace = $total_interest_balanace - $principal;
    $total_interest = $interest + $total_interest;
    echo number_format($total_interest, 2);
    return $total_interest;
  }

  //This function will return the total interest that will display in the information panel. 
  function display_total_interest($loan_amount, $interest_rate, $time_num, $payment, $time_span) {

    if ($time_span == 'years'){
      $time_num = $time_num * 12;
    }
  
    $total_interest = 0;
    $loan = $loan_amount;

    while ($i < $time_num) {
      $interest = $loan * $interest_rate;
      $principal = $payment - $interest;
      $loan = $loan - $principal;
      $total_interest = $interest + $total_interest;
      $i++;
    }
    return $total_interest;
  }

  $total_interest_display = display_total_interest($loan_amount, $interest_rate, $time_num, $payment, $time_span);

  //These variables will be used in the time function to show the date. 
  $current_Date = new DateTime();
  $current_date_in_func = $current_Date; 

  //This function will display the month and year for the payment schedule. 
  function dateCalc($current_date_in_func){

      //Getting the time formatted how I want it. 
      $time_format = 'F Y';
      //Add one month to the DateTime Object
      $add_month = new DateInterval('P1M');
      //$current_Date = new DateTime();
      $month = $current_date_in_func->add($add_month);
      $month_added = $month->format($time_format);
      echo $month_added;
  }

  //In the grand tradition of writing everything twice, this function will allow me 
  //to display the actual final payoff date in the information div. 
  $current_Date_2 = new DateTime();
  $current_date_func = $current_Date_2; 

  //This function will get the final payment date. 
  function final_payment_date($current_date_func, $time_span, $time_num) {
    
    if ($time_span == 'years'){
      $time_num = $time_num * 12;
    }

    for ($i = 0; $i < $time_num; $i++){
      //Getting the time formatted how I want it. 
      $time_format = 'F Y';
      //Add one month to the DateTime Object
      $add_month_2 = new DateInterval('P1M');
      //$current_Date = new DateTime();
      $month_2 = $current_date_func->add($add_month_2);
      $month_added_2 = $month_2->format($time_format);
    }

    return $month_added_2;
  }

  $last_payment = final_payment_date($current_date_func, $time_span, $time_num);

?>
<!DOCTYPE html>
<html>
<head>
  <title>Final Project</title>
  <link rel="stylesheet" type="text/css" href="assets/css/index.css">
</head>
<body>

    <header id='results_header'>
      <div>
        <h5 class='center'>
          Opportunity is missed by most people because<br /> it is dressed in overalls 
          and looks like work.<br />
          --Thomas Edison
        </h5>
      </div>
    </header>

    <h1 class='center'><?php echo $message; ?></h1>
    <h1 class='center'><?php echo $message_two; ?></h1>
    <div id='go_back_div'>
      <a class='center' href="index.php">Go Back / New Calculation</a>
    </div>
    
    <?php if (!$message_two) : ?>
    <main id='results_main'>

      <div id='information_div'>

        <h1 class='center'>Information on Loan:</h1>

        <div>
          <p><span>Loan Amount: $</span><?php echo $loan_amount ?>. </p>
          <p><span>Time Period: </span><?php echo $time_num . ' ' . $time_span ?>. </p>
          <p><span>Interest Rate: </span><?php echo $original_interest_rate ?>%</p>
          <p><span>Monthly Payments: $</span><?php echo number_format($payment, 2) ?></p>
          <p><span>Total Interest: $</span><?php echo number_format($total_interest_display, 2) ?></p>
          <p><span>Est. PayOff Date: </span><?php echo $last_payment ?></p>
        </div>

      </div>

      <div id='table_div'>
        <h1>Amortization Schedule</h1>
        <table>

          <thead>
            <tr>
              <th>Payment Date</th>
              <th>Payment Number</th>
              <th>Payment</th>
              <th>Interest</th> 
              <th>Principal</th>  
              <th>Total Interest</th>
              <th>Balance</th>
            </tr>
          </thead>

          <tbody>
            <?php for ($i = 1; $i <= $loan_length; $i++) { ?>
              <tr>
                <td><?php dateCalc($current_date_in_func); ?></td>
                <td><?php echo $i; ?></td>
                <td>$<?php payment($payment); ?></td>
                <td>$<?php show_interest($balance, $interest_rate); ?></td>
                <td>$<?php $balance = show_principal($balance, $payment, $interest_rate); ?></td>
                <td>$<?php $total_interest = get_total_interest($total_interest_balanace, $interest_rate, $total_interest, $payment); ?></td>
                <td>$<?php show_balance($balance); ?></td>
              </tr>
            <?php } ?>
          </tbody>

        </table>
      </div>

    </main>
    <?php endif; ?>

    <footer>
        <p class="font copyright">
            &copy; <?php echo date("Y"); ?> Cuddy Loan Calculator, Inc.
        </p>
    </footer>

<script type="text/javascript" src='assets/js/index.js'></script>
<script type="text/javascript" src='assets/js/second.js'></script>
</body>
</html>