<?php include '../view/header.php'; ?>
<link rel="stylesheet" type="text/css" href="../assets/css/generic.css">
<link rel="stylesheet" type="text/css" href="../assets/css/add_room.css">

<div class='wrapper'>

    <!-- Start of main section -->
    <main class='main_add_room_page' role='main'>

      <section class='form_section'>

        <h2 class='font'>Add a New Conferance Room</h2>

          <form action="index.php" method="post">

            <input type="hidden" name="action" value="add_room" />

            <!-- The below inputs will deal with getting information for the prisoner -->
            <input placeholder='Room Name' type='text' name='room_name' required>&nbsp;


            <label>&nbsp;</label>
            <input type="submit" value="Add Room" />

          </form>

      </section>

      <section class='picture_section'>

      </section>

    </main>
    <!-- End of main section -->

</div>

<?php include '../view/footer.php'; ?>