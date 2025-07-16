<p><?=$totalQuestions?> questions have been submiteted to the forum.</p>

<?php foreach ($questions as $question): ?>
  <blockquote>
    <?= htmlspecialchars($question['text_content'], ENT_QUOTES, 'UTF-8') ?>

    (by <a href=""><?=htmlspecialchars($question['name'], ENT_QUOTES, 'UTF-8'); ?></a>)
<img height="100px" src="../images/<?=htmlspecialchars($question['img_content'], ENT_QUOTES,'UTF-8'); ?>"/>
  </blockquote>
<?php endforeach; ?>
