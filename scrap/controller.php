<?php
  //I've moved some of the functions that I use through my project into this file which acts some what
  //as a controller. 

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

  
?>