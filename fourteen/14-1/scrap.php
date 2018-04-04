 <?php   
    public function addProduct($product) {
        $db = Database::getDB();

        //$category_id = $product->getID(); //This did not work to solve my problem
        $category_id = $product->getCategory()->getID();
        $code = $product->getCode();
        $name = $product->getName();
        $price = $product->getPrice();

        //When I echo the category ID, I'm not getting it. 
        echo $category_id;
        //echo $code; //I can get all the other values though

        $query =
            "INSERT INTO products
                 (categoryID, productCode, productName, listPrice)
             VALUES
                ()
                 ('$category_id', '$code', '$name', '$price')";

        $row_count = $db->exec($query);
        return $row_count;
    }


    //From category_db.php file => old
    public function getCategory($category_id) {
        $db = Database::getDB();

        $query = 'SELECT * FROM categories
                  WHERE categoryID = :category_id';

        $statement = $db->prepare($query);

        $row = $statement->fetch();

        $category = new Category();
        $category->setID($row['categoryID']);
        $category->setName($row['categoryName']);
        return $category;
    }

        public function addProduct($product) {
        $db = Database::getDB();

        //$category_id = $product->getID(); //This did not work to solve my problem
        $category_id = $product->getCategory()->getID();
        $code = $product->getCode();
        $name = $product->getName();
        $price = $product->getPrice();

        //When I echo the category ID, I'm not getting it. 
        echo $category_id;
        echo $code; //I can get all the other values though

        $query =
            "INSERT INTO products
                 (categoryID, productCode, productName, listPrice)
             VALUES
                (:category_id, :code, :name, :price)";

        $statement = $db->prepare($query);
        $statement->bindValue(':category_id', $category_id);
        $statement->bindValue(':code', $code);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':price', $price);
        $statement->execute();
        $statement->closeCursor();
    }

    //From category_db file, second function
        // public function getCategory($category_id) {
    //     $db = Database::getDB();

    //     $query = "SELECT * FROM categories
    //               WHERE categoryID = '$category_id'";

    //     $statement = $db->query($query);
    //     $row = $statement->fetch();

    //     $category = new Category();
    //     $category->setID($row['categoryID']);
    //     $category->setName($row['categoryName']);

    //     return $category;
        
    // }

    /////////////////// BELOW SHOULD ALL BE FROM product_db.php files 

    //From the product_db.php file 
        // public function deleteProduct($product_id) {
    //     $db = Database::getDB();
    //     $query = "DELETE FROM products
    //               WHERE productID = '$product_id'";
    //     $row_count = $db->exec($query);
    //     return $row_count;
    // }

    // public function getProduct($product_id) {
    //     $db = Database::getDB();
    //     $query = "SELECT * FROM products
    //               WHERE productID = '$product_id'";
    //     $result = $db->query($query);
    //     $row = $result->fetch();

    //     $categoryDB = new CategoryDB();
    //     $category = $categoryDB->getCategory($row['categoryID']);

    //     $product = new Product();
    //     $product->setCategory($category);
    //     $product->setId($row['productID']);
    //     $product->setCode($row['productCode']);
    //     $product->setName($row['productName']);
    //     $product->setPrice($row['listPrice']);

    //     return $product;
    // }

    //BELOW from add_product function 

            // $query =
        //     "INSERT INTO products
        //          (categoryID, productCode, productName, listPrice)
        //      VALUES
        //          ('$category_id', '$code', '$name', '$price')";

        // $row_count = $db->exec($query);
        // return $row_count;

        /////////OLD WAY //////
?>