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
      <td>
        <form action="index.php" method="post">
          <input type="hidden" name="action" value="delete_room">
          <input type="hidden" name="room_id" value="<?php echo $room['room_id']; ?>">
          <input class='input_style' type="submit" value="Delete">
        </form>
      </td>
    </tr>
    <?php endforeach; ?>

  </table>

  <a href="?action=add_room_form">Add Room</a>
  <a href="?action=make_reservation">Make Reservation</a>

</main>
<!-- End of the main section -->



<?php include '../view/footer.php'; ?>