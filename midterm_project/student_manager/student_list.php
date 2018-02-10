<?php include '../view/header.php'; ?>
<main>
  <h1>The Students</h1>

  <!-- This table will display all of the students -->
  <table>

    <tr>
      <th>Student Name</th>
      <th>Numerical Grade</th>
      <th>Letter Grade</th>
      <th>&nbsp;</th>
    </tr>

    <?php foreach ($students as $student) : ?>
    <tr>
      <td><?php echo $student['student_name']; ?></td>
      <td><?php echo $student['student_grade']; ?></td>
      <td><?php echo $student['letter_grade']; ?></td>
      <td>
        <form action="." method="post">
          <input type="hidden" name="action" value="delete_product">
          <input type="hidden" name="studentID" value="<?php echo $student['studentID']; ?>">
          <input type="submit" value="Delete">
        </form>
      </td>
    </tr>
    <?php endforeach; ?>

  </table>

  <a href="">Add Student</a>



</main>



<?php include '../view/footer.php'; ?>