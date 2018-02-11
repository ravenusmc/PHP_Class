<?php include '../view/header.php'; ?>
<main id='student_list_main'>

  <div>
    <h1>The Students</h1>
  </div>

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
          <input class='initial_btn' type="submit" value="Delete">
        </form>
      </td>
    </tr>
    <?php endforeach; ?>

  </table>

  <br>

  <div id='add_student_div'>
    <a href="?action=show_add_student_form">Add Student</a>
  </div>
  

</main>

<hr>

<?php include '../view/footer.php'; ?>