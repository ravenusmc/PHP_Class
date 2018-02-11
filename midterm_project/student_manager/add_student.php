<?php include '../view/header.php'; ?>

<main id='add_student_main'>

  <h1>Add Student</h1>

  <form id='add_student_form' action="index.php" method="post">

    <input type="hidden" name="action" value="add_student" />

    <div>
      <label class='label_fix'>Student Name:</label>
      <input id='input_size_fix' type="text" name="student_name" />
    </div>

    <br>

    <div>
      <label class='label_fix'>Student Grade:</label>
      <input id='input_size_fix' type="number" name="student_grade" />
    </div>

    <br>

    <label>&nbsp;</label>
    <input class='initial_btn' type="submit" value="Add Student" />
    <br>

  </form>

</main>

<hr>


<?php include '../view/footer.php'; ?>