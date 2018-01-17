<?php

  //Get the data from the form
  $product_description = filter_input(INPUT_POST, 'product_description');
  $list_price = filter_input(INPUT_POST, 'list_price');
  $discount_percent = filter_input(INPUT_POST, 'discount_percent');

  //Calculatting discount price and amount 
  $discount_amount = $list_price * ($discount_percent / 100);
  $discount_price = $list_price - $discount_amount;

  //Formatting the variables 
  $list_price_form = "$".number_format($list_price, 2);
  $discount_percent_form = number_format($discount_percent, 1)."%";
  $discount_amount_form = "$".number_format($discount_amount, 2);
  $discount_price_form = "$".number_format($discount_price, 2);

  //Ensuring that incoming text is not harmful
  $product_description_fixed = htmlspecialchars($product_description);
  $list_price_form = htmlspecialchars($list_price_form);
  $discount_percent_form = htmlspecialchars($discount_percent_form);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Discount Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <main>
        <h1>Product Discount Calculator</h1>

        <label>Product Description:</label>
        <span><?php echo $product_description_fixed; ?></span><br>

        <label>List Price:</label>
        <span><?php echo $list_price_form; ?></span><br>

        <label>Standard Discount:</label>
        <span><?php echo $discount_percent_form; ?></span><br>

        <label>Discount Amount:</label>
        <span><?php echo $discount_amount_form; ?></span><br>

        <label>Discount Price:</label>
        <span><?php echo $discount_price_form; ?></span><br>
    </main>
</body>
</html>