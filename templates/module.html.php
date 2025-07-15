<p><?=$totalModules?> modules have been submiteted to the Internet Joke Database.</p>

<?php foreach ($modules as $module): ?>
  <blockquote>
    <?= htmlspecialchars($module['Mname'], ENT_QUOTES, 'UTF-8') ?>

    <a href="../admin/editmodule.php?id=<?=$module['id']?>">Edit</a>


  </blockquote>
<?php endforeach; ?>
    <form action="../admin/deletemodule.php" method="post">
      <input type="hidden" name="id" value="<?=$module['id']?>">
      <input type="submit" value="Delete">
    </form>