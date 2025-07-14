
<p><?=$totalAuthors?> author have been submiteted to the Internet Joke Database.</p>
<?php foreach ($authors as $author): ?>
  <blockquote>
    <?= htmlspecialchars($author['name'], ENT_QUOTES, 'UTF-8') ?>

    (Email: <a href="mailto:<?=htmlspecialchars($author['email'], ENT_QUOTES, 'UTF-8');?>"><?=htmlspecialchars($author['name'], ENT_QUOTES, 'UTF-8'); ?></a>)

    <a href="editauthor.php?id=<?=$author['id']?>">Edit</a>

    <form action="deleteauthor.php" method="post">
      <input type="hidden" name="id" value="<?=$author['id']?>">
      <input type="submit" value="Delete">
    </form>
  </blockquote>
<?php endforeach; ?>
