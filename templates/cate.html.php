<p><?=$totalCates?> categories have been submiteted to the Internet Joke Database.</p>

<?php foreach ($cates as $cate): ?>
  <blockquote>
    <?= htmlspecialchars($cate['name'], ENT_QUOTES, 'UTF-8') ?>

    <a href="editcate.php?id=<?=$cate['id']?>">Edit</a>

    <form action="deletecate.php" method="post">
      <input type="hidden" name="id" value="<?=$author['id']?>">
      <input type="submit" value="Delete">
    </form>
  </blockquote>
<?php endforeach; ?>
