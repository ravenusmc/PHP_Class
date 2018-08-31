<?php include '../view/header.php'; ?>
<link rel="stylesheet" type="text/css" href="../assets/css/generic.css">
<link rel="stylesheet" type="text/css" href="../assets/css/room_list.css">

<div class='wrapper'>

  <!-- Start of the main section -->
  <main class='main_area' role="main">

    <section class='table_section'>

      <header role="banner">
        <div>
          <h1 class='font'>The Rooms</h1>
        </div>
      </header>

      <!-- This table will display all of the rooms in the database -->
      <table>

        <tr>
          <th class='font'>Room Name</th>
          <th class='font'>Action</th>
        </tr>

        <?php foreach ($rooms as $room): ?>
        <tr>
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

      <a class='font' href="?action=add_room_form">Add Room</a>
      <a class='font' href="?action=make_reservation_form">Make Reservation</a>

    </section>

    <section class='image_section'>

    </section>


  </main>
  <!-- End of the main section -->

</div>



<?php include '../view/footer.php'; ?>