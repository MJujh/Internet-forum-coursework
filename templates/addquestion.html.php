<div class="container mt-4 mb-4">
  <h2 class="mb-3">Ask a Question</h2>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="text_content" class="form-label">Ask your question here</label>
      <textarea name="text_content" id="text_content" rows="3" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
      <label for="modules" class="form-label">Select a module</label>
      <select name="modules" id="modules" class="form-select" required>
        <option value="">Select a module</option>
        <?php foreach ($modules as $module): ?>
        <option value="<?= htmlspecialchars($module['id'], ENT_QUOTES, 'UTF-8'); ?>">
          <?= htmlspecialchars($module['Mname'], ENT_QUOTES, 'UTF-8'); ?>
        </option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="mb-3">
      <label for="img_content" class="form-label">Image (optional)</label>
      <input type="file" name="img_content" id="img_content" class="form-control" accept="image/*">
    </div>
    <button type="submit" name="submit" class="btn btn-success">Add</button>
  </form>
</div>