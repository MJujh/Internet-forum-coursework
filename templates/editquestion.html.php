<form action="" method="post">
  <input type="hidden" name="id" value="<?= $question['id']; ?>">
  <label for="text_content">Edit your question here:</label>
  <textarea name="text_content" rows="5" cols="70">
    <?= $question['text_content'] ?>
  </textarea>

      <select name="modules">
        <option value="">Select a module</option>
        <?php foreach ($modules as $module):?>
        <option value="<?=htmlspecialchars($module['id'], ENT_QUOTES, 'UTF-8'); ?>">
            <?=htmlspecialchars($module['Mname'],ENT_QUOTES,'UTF-8'); ?>
        </option>
        <?php endforeach;?>
    </select>

        <select name="user">
        <option value="">Asign a user</option>
        <?php foreach ($users as $user):?>
        <option value="<?=htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8'); ?>">
            <?=htmlspecialchars($user['name'],ENT_QUOTES,'UTF-8'); ?>
        </option>
        <?php endforeach;?>
    </select>
  <input type="submit" name="submit" value="Save">
</form>
