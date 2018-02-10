<?php

  //Ch02 Lab: Write a PHP Script containing a function that calculates the tax (8%) on a purchase of $48.72.
  
  //This function will determine the tax of 8% on an item. Yes, I'm passing by reference to get the tax value 
  //out of the function-Have not done that since taking C++!!! 
  function tax(&$tax, $item_price) {

    //Getting the tax amount
    $tax = $item_price * .08;
    //Getting cost after tax
    $item_cost_after_tax = $item_price + $tax;
    //Returning the item after tax cost
    return $item_cost_after_tax;

  }
  
  //Declaring variables
  $item_price = 48.72;
  $tax = 0.0;

  //Using the tax function 
  $item_price = tax($tax, $item_price);


  //Formating the value 
  $item_price_formatted = "$".number_format($item_price, 2);
  $tax_formatted = "$".number_format($tax, 2);

?>
<!DOCTYPE html>
<html>
<head>
  <title>Chap One Example</title>
  <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>

  <div class='display_info_area'>
    <h1>Lab Two Assignment</h1>
    <h3>Write a PHP Script containing a function that calculates the tax (8%) on a purchase of $48.72.</h3>
    <p>A tax of 8% on an item costing $48.72 is: <?php echo $item_price_formatted ?></p>
    <p>The tax itself is: <?php echo $tax_formatted ?></p>
  </div>

</body>
</html>