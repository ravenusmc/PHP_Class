<?php

class ProductDB {

    public function getProductsByCategory($category_id) {
        $db = Database::getDB();

        $categoryDB = new CategoryDB();
        $category = $categoryDB->getCategory($category_id);

        $query = "SELECT * FROM products
                  WHERE categoryID = '$category_id'
                  ORDER BY productID";

        $result = $db->query($query);
        $products = array();
        
        foreach ($result as $row) {
            $product = new Product();
            $product->setCategory($category);
            $product->setId($row['productID']);
            $product->setCode($row['productCode']);
            $product->setName($row['productName']);
            $product->setPrice($row['listPrice']);

            $products[] = $product;
        }
        return $products;
    }

    public function getProduct($product_id) {
        $db = Database::getDB();
        $query = 'SELECT * FROM products
                  WHERE productID = :product_id';

        $statement = $db->prepare($query);
        $statement->bindValue(":product_id", $product_id);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();

        $categoryDB = new CategoryDB();
        $category = $categoryDB->getCategory($row['categoryID']);

        $product = new Product();
        $product->setCategory($category);
        $product->setId($row['productID']);
        $product->setCode($row['productCode']);
        $product->setName($row['productName']);
        $product->setPrice($row['listPrice']);

        return $product;
    }

    public function deleteProduct($product_id) {
        $db = Database::getDB();
        $query = 'DELETE FROM products
                  WHERE productID = :product_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':product_id', $product_id);
        $statement->execute();
        $statement->closeCursor();
    }

    public function addProduct($product) {
        $db = Database::getDB();

        //$category_id = $product->getID(); //This did not work to solve my problem
        $category_id = $product->getCategory()->getID();
        $code = $product->getCode();
        $name = $product->getName();
        $price = $product->getPrice();

        //When I echo the category ID, I'm not getting it. 
        //echo $category_id;
        //echo $code; //I can get all the other values though

        $query =
            'INSERT INTO products
                 (categoryID, productCode, productName, listPrice)
             VALUES
                (:category_id, :code, :name, :price)';

        $statement = $db->prepare($query);
        $statement->bindValue(':category_id', $category_id);
        $statement->bindValue(':code', $code);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':price', $price);
        $statement->execute();
        $statement->closeCursor();

    }

}
?>