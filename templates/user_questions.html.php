<p><?=$totalQuestions?> questions have been submiteted to the forum.</p>

<?php foreach ($questions as $question): ?>
  <blockquote>
    <?= htmlspecialchars($question['text_content'], ENT_QUOTES, 'UTF-8') ?>

    (by <a href="mailto:<?=htmlspecialchars($question['email'], ENT_QUOTES, 'UTF-8');?>"><?=htmlspecialchars($question['name'], ENT_QUOTES, 'UTF-8'); ?></a>)

<!--     <a href="editquestion.php?id=<?=$question['id']?>">Edit</a> -->

     <img height="100px" src="../images/<?=htmlspecialchars($question['img_content'], ENT_QUOTES,'UTF-8'); ?>"/>

<!--     <form action="deletequestion.php" method="post">
      <input type="hidden" name="id" value="<?=$question['id']?>">
      <input type="submit" value="Delete">
    </form>
 -->
<!--   <form action="" method="post">
  <input type="hidden" name="jokeid" value="<?= $joke['id']; ?>">
  <label for="joketext">Edit your joke here:</label>
  <textarea name="joketext" rows="5" cols="70">
    <?= $joke['joketext'] ?>
  </textarea>
  <input type="submit" name="submit" value="Save">
</form> -->

 
  </blockquote>
<?php endforeach; ?>
