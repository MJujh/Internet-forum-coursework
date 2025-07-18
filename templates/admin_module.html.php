<p><?=$totalModules?> modules have been submitted to the Internet Joke Database.</p>

<div class="row">
<?php foreach ($modules as $module): ?>
  <div class="col-12 mb-3">
    <div class="card bg-dark text-light shadow-sm h-100">
      <div class="card-body d-flex justify-content-between align-items-center">
        <span class="fw-bold"><?= htmlspecialchars($module['Mname'], ENT_QUOTES, 'UTF-8') ?></span>
        <div>
          <a href="../admin/editmodule.php?id=<?= $module['id'] ?>" class="btn btn-sm btn-outline-warning me-2">Edit</a>
          <form action="../admin/deletemodule.php" method="post" style="display:inline;">
            <input type="hidden" name="id" value="<?= $module['id'] ?>">
            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this module?');">Delete</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>
</div>
