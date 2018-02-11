<?php include '../view/header.php'; ?>

<main>

  <h1>Add Student</h1>

  <form action="index.php" method="post">

    <input type="hidden" name="action" value="add_student" />

    <label>Student Name:</label>
    <input type="text" name="student_name" />
    <br>

    <label>Student Grade:</label>
    <input type="number" name="student_grade" />
    <br>

    <label>&nbsp;</label>
    <input type="submit" value="Add Student" />
    <br>

  </form>

</main>




<?php include '../view/footer.php'; ?>