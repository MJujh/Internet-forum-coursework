<div class="container mt-4 mb-4">
  <h2 class="mb-3">Edit Module</h2>
  <form action="" method="post">
    <input type="hidden" name="id" value="<?= htmlspecialchars($module['id'], ENT_QUOTES, 'UTF-8') ?>">
    <div class="mb-3">
      <label for="name" class="form-label">Adjust your module name here</label>
      <textarea name="name" id="name" rows="3" class="form-control" required><?= htmlspecialchars($module['Mname'], ENT_QUOTES, 'UTF-8') ?></textarea>
    </div>
    <button type="submit" name="submit" class="btn btn-warning">Edit Module</button>
  </form>
</div>