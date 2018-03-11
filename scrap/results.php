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

  //Validation to ensure that the user entered all of the information. 
  if (empty($loan_amount)) {
    $message = 'Please fill out the box for the loan amount!';
  }else if (empty($loan_length)) {
    $message = 'Please fill out the box for the loan length!';
  }else if (empty($interest_rate)) {
    $message = 'Please fill out the box for the interest rate';
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
      $principal = number_format($principal, 2);
      echo $principal;
      $balance = $balance - $principal;  
      return $balance; 
  } 

  //This function will show the balance as it changes from payment to payment. 
  function show_balance($balance) {

      if ($balance < 0){
        $balance = 0;
        echo $balance;
      }else {
        echo $balance; 
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

  // $total_interest_balanace_two = $loan_amount;
  // $total_interest_two = 0;

  // function get_total_interest_two(&$total_interest_balanace_two, $interest_rate, $total_interest, $payment, $loan_length) {

  //   $interest = $total_interest_balanace * $interest_rate;
  //   $principal = $payment - $interest;
  //   $total_interest_balanace = $total_interest_balanace - $principal;
  //   $total_interest_two = $interest + $total_interest;
  //   echo number_format($total_interest_two, 2);
  //   return $total_interest_two;
  // }

  // $total_interest_two



  //These variables will be used in the time function to show the date. 
  $current_Date = new DateTime();
  $current_date_in_func = $current_Date; 

  //TIME FUNCTION
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




?>
<!DOCTYPE html>
<html>
<head>
  <title>Project</title>
  <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>

    <main>

        <h1>Information on Loan:</h1>

        <div>
          <p>The amount of your loan was: $<?php echo $loan_amount ?>, over <?php echo $time_num . ' ' . $time_span ?>.</p>
          <p>Your interest rate is: <?php echo $interest_rate ?>%</p>
          <p>Your monthly payments will be: $<?php echo number_format($payment, 2) ?></p>
        </div>

        <h1><?php echo $message; ?></h1>

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
                <!-- <td>DATE</td> -->
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



    </main>

    <footer>
        <p class="font copyright">
            &copy; <?php echo date("Y"); ?> Cuddy Loan Calculator, Inc.
        </p>
    </footer>

</body>
</html>