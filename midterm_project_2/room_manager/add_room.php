<?php include '../view/header.php'; ?>


<!-- Start of main section -->
<main role='main'>

  <h2>Please Fill Out Form to Add a New Conferance Room</h2>

  <form action="index.php" method="post">

    <input type="hidden" name="action" value="add_room" />

    <!-- The below inputs will deal with getting information for the prisoner -->
    <input placeholder='Room Name' type='text' name='room_name' required>&nbsp;


    <label>&nbsp;</label>
    <input type="submit" value="Add Room" />

  </form>

</main>
<!-- End of main section -->




<?php include '../view/footer.php'; ?>