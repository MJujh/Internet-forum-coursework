<form action="" method="post">
  <input type="hidden" name="id" value="<?= $question['id']; ?>">
  <label for="text_content">Edit your question here:</label>
  <textarea name="text_content" rows="5" cols="70">
    <?= $question['text_content'] ?>
  </textarea>
  <input type="submit" name="submit" value="Save">
</form>
