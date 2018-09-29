<?php include '../view/header.php'; ?>
<link rel="stylesheet" type="text/css" href="../assets/css/error.css">

<main>
  <div>
    <h1 class='center'>Error</h1>
    <p class="first_paragraph center"><?php echo $error; ?></p>
    <h2>Hit Back Button or Link Below</h2>
    <div class='anchor_center'>
      <a href="?action=make_reservation_form">Reservation Page</a>
    </div>
  </div>
</main>

<?php include '../view/footer.php'; ?>