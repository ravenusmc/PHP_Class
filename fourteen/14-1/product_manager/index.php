<?php
require('../model/database.php');
require('../model/category.php');
require('../model/category_db.php');
require('../model/product.php');
require('../model/product_db.php');

//Creating the objects to deal with the database. 
$categoryDB = new CategoryDB();
$productDB = new ProductDB();

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_products';
    }
}  

if ($action == 'list_products') {
    $category_id = filter_input(INPUT_GET, 'category_id', 
            FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }

    // Get product and category data
    $current_category = $categoryDB->getCategory($category_id);
    $categories = $categoryDB->getCategories();
    $products = $productDB->getProductsByCategory($category_id);

    // Display the product list
    include('product_list.php');
} else if ($action == 'delete_product') {
    // Get the IDs
    $product_id = filter_input(INPUT_POST, 'product_id', 
            FILTER_VALIDATE_INT);
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);

    // Delete the product
    $productDB->deleteProduct($product_id);

    // Display the Product List page for the current category
    header("Location: .?category_id=$category_id");
} else if ($action == 'show_add_form') {
    $categories = $categoryDB->getCategories();
    include('product_add.php');
} else if ($action == 'add_product') {
    //Personal notes: Cannot add a product. after many hours got this to work!
    //Getting user data here. 
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    $code = filter_input(INPUT_POST, 'code');
    $name = filter_input(INPUT_POST, 'name');
    $price = filter_input(INPUT_POST, 'price');

    //I echoed out the id and know thats right
    // echo $category_id;
    
    if ($category_id == NULL || $category_id == FALSE || $code == NULL || 
            $name == NULL || $price == NULL || $price == FALSE) {
        $error = "Invalid product data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        
        //This uses the $categoryDB object to get the category. 
        $current_category = $categoryDB->getCategory($category_id); //Error may be here
        //The error was in the above line. I had an issue in the getCategory method. 
        //For the longest time I kept looking at the getCategory method in the product class!!

        //Testing to see what the current category is
        //echo $current_category; //When I run this, I only get an error.

        // Create the Product object
        $product = new Product();

        //$product->setID($category_id); //This did not work
        $product->setCategory($current_category);
        $product->setCode($code);
        $product->setName($name);
        $product->setPrice($price);

        //This confirms my belief that the id is not being filled in. 
        //var_dump($product);

        //I know that when I'm getting to the model to add a product, 
        //the ID is not being filled in on the database. 

        // Add the Product object to the database
        $productDB->addProduct($product);

        // Display the Product List page for the current category
        header("Location: .?category_id=$category_id");
    }
} 


?>