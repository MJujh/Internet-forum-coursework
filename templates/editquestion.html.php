<form action="" method="post" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?= $question['id']; ?>">
  <label for="text_content">Edit your question here:</label><br>
  <textarea name="text_content" rows="5" cols="70" style="margin-bottom:12px;"><?= $question['text_content'] ?></textarea>


  <label for="img_content">Image:</label><br>
   <input type="file" name="img_content" id="img_content" class="form-control" accept="image/*">
  <?php if (!empty($question['img_content'])): ?>
    <div style="margin-bottom:12px;">
      <img src="../images/<?= htmlspecialchars($question['img_content'], ENT_QUOTES, 'UTF-8') ?>" alt="question image" class="question-image" style="max-width:300px;border-radius:8px;box-shadow:0 2px 8px #0002;">
      <div style="font-size:0.95em;color:#888;">Current image</div>
      <label style="display:block;margin-top:6px;font-size:0.98em;">
        <input type="checkbox" name="remove_image" value="1"> Remove this image
      </label>
    </div>
  <?php endif; ?>

  <label for="modules">Module:</label><br>
  <select name="modules" style="margin-bottom:12px;">
    <option value=""><?= htmlspecialchars($question['module_name']) ?></option>
    <?php foreach ($modules as $module):?>
      <option value="<?=htmlspecialchars($module['id'], ENT_QUOTES, 'UTF-8'); ?>">
        <?=htmlspecialchars($module['Mname'],ENT_QUOTES,'UTF-8'); ?>
      </option>
    <?php endforeach;?>
  </select>
  <br>

  <label for="user">User:</label><br>
  <select name="user" style="margin-bottom:18px;">
    <option value=""><?= htmlspecialchars($question['name']) ?></option>
    <?php foreach ($users as $user):?>
      <option value="<?=htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8'); ?>">
        <?=htmlspecialchars($user['name'],ENT_QUOTES,'UTF-8'); ?>
      </option>
    <?php endforeach;?>
  </select>
  <br>

  <input type="submit" name="submit" value="Save" style="padding:8px 24px;border-radius:6px;background:#3a7bd5;color:#fff;border:none;font-size:1rem;cursor:pointer;">
</form>
