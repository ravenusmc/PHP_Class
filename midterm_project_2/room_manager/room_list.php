<?php include '../view/header.php'; ?>

<header role="banner">
  <div>
    <h1>The Rooms</h1>
  </div>
</header>

<!-- Start of the main section -->
<main role="main">

  <!-- This table will display all of the rooms in the database -->
  <table>

    <tr>
      <th>Room ID</th>
      <th>Room Name</th>
    </tr>

    <?php foreach ($rooms as $room): ?>
    <tr>
      <td><?php echo $room['room_id']; ?></td>
      <td><?php echo $room['room_name']; ?></td>
    </tr>
    <?php endforeach; ?>

  </table>

</main>
<!-- End of the main section -->




<?php include '../view/footer.php'; ?>