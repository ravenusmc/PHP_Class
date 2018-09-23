<?php
require_once('../../util/main.php');
require_once('../../util/tags.php');
require_once('../../model/database.php');
require_once('../../model/product_db.php');
require_once('../../model/category_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_categories';
    }
}

switch ($action) {

  case 'list_products':
    include('category_list.php');
    break;

}

?>

<?php  include '../../util/main.php'; ?>
<?php include '../../view/header.php'; ?>
<section>
    <h2>Category Manager - under construction</h2>
</section>
<?php include '../../view/footer.php'; ?>
