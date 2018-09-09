
<h1>Comment: <?php echo $comment['comment']; ?></h1>

<?php foreach ($comments as $comment): ?>

  <p><?php echo $comment['reply']; ?></p>
  <p><?php echo $comment['created']; ?></p>

<?php endforeach; ?>

