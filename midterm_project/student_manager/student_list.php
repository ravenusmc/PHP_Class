<?php include '../view/header.php'; ?>
<main>

  <h1 class='center'>The Students</h1>

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
        <form action="index.php" method="post">
          <input type="hidden" name="action" value="delete_student">
          <input type="hidden" name="studentID" value="<?php echo $student['studentID']; ?>">
          <input type="submit" value="Delete">
        </form>
      </td>
    </tr>
    <?php endforeach; ?>

  </table>

  <br>

  <a href="?action=show_add_student_form">Add Student</a>

</main>

<?php include '../view/footer.php'; ?>