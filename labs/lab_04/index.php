<?php
  
  require_once('database.php');


  // Get all jobs
  $query = 'SELECT * FROM jobs';
  $statement = $db->prepare($query);
  $statement->execute();
  $jobs = $statement->fetchAll();
  $statement->closeCursor();

?>

<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>Chapter 4 Lab</title>
    <link rel="stylesheet" type="text/css" href="lab_4.css" />
</head>

<!-- the body section -->
<body>

<header>
  <h1>Display Jobs Table</h1>
  <p>Sorry, plain simple site! No styling!</p>
</header>

<main>

  <table>
      <tr>
        <th>Job Id</th>
        <th>Job Title</th>
        <th>Min Salary</th>
        <th>Max Salary</th>
        <th>Effective Date</th>
      </tr>
      <?php foreach ($jobs as $job) : ?>
        <tr>
          <td><?php echo $job['job_id']; ?></td>
          <td><?php echo $job['job_title']; ?></td>
          <td><?php echo $job['min_salary']; ?></td>
          <td><?php echo $job['max_salary']; ?></td>
          <td><?php echo $job['effective_date']; ?></td>
        </tr>
    <?php endforeach; ?>
  </table>


</main>

</body>
</html>