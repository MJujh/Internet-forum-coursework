<p><?=$totalMessages?> messages have been received.</p>

<?php foreach ($messages as $message): ?>
  <blockquote>
    <?= htmlspecialchars($message['message'], ENT_QUOTES, 'UTF-8') ?></br>
    <a>Sent on: <?=htmlspecialchars($message['date'], ENT_QUOTES, 'UTF-8'); ?></a><br>


    <!--<a href="editquestion.php?id=<?=$joke['id']?>">Edit</a>-->

    <form action="deletedm.php" method="post">
      <input type="hidden" name="id" value="<?=$message['id']?>">
      <input type="submit" value="Delete">
    </form>
  </blockquote>
<?php endforeach; ?>
<!-- 
      <form action="user_adm.php" method="post">
      <input type="hidden" name="id" value="<?=$message['id']?>">
      <input type="submit" value="Ask Admin">
    </form>
 -->