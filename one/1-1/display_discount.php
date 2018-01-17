<?php
  
  //Get the data from the form
  $product_description = $_POST['product_description'];
  $list_price = $_POST['list_price'];
  $discount_percent = $_POST['discount_percent'];

  //Calculate the discount
  $discount = $list_price * $discount_percent * .01;
  $discount_price = $list_price - $discount;

  //Apply currency formatting 
  $list_price_formatted = "$".number_format($list_price, 2);
  $discount_percent_formatted = number_format($discount_percent, 1)."%";
  $discount_formatted = "$".number_format($discount, 2);
  $discount_price_formatted = "$".number_format($discount_price, 2);

  //Escape the unformatted input 
  $product_description_escaped = htmlspecialchars($product_description);

  //Keeping this only for my reference
  //echo 'Current PHP version: ' . phpversion();

?>

<!DOCTYPE html>
<html>
<head>
  <title>Chap One Example</title>
  <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>

  <main>
    <h1>Product Discount Calculator</h1>

        <label>Product Description:</label>
        <span><?php echo $product_description_escaped; ?></span><br>

        <label>List Price:</label>
        <span><?php echo $list_price_formatted; ?></span><br>

        <label>Standard Discount:</label>
        <span><?php echo $discount_percent_formatted; ?></span><br>

        <label>Discount Amount:</label>
        <span><?php echo $discount_formatted; ?></span><br>

        <label>Discount Price:</label>
        <span><?php echo $discount_price_formatted; ?></span><br>

  </main>

</body>
</html>