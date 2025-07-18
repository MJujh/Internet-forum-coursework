<p><?=$totalUsers?> users have registered to the Internet Joke Database.</p>

<div class="row">
<?php foreach ($users as $user): ?>
  <div class="col-12 mb-3">
    <div class="card bg-dark text-light shadow-sm h-100">
      <div class="card-body d-flex justify-content-between align-items-center">
        <span class="fw-bold">
          <?= htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8') ?>
          <small class="text-secondary ms-2">(Email: <a href="mailto:<?= htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8'); ?>" class="text-secondary"><?= htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8'); ?></a>)</small>
        </span>
        <div>
          <a href="edituser.php?id=<?= $user['id'] ?>" class="btn btn-sm btn-outline-warning me-2">Edit</a>
          <form action="deleteuser.php" method="post" style="display:inline;">
            <input type="hidden" name="id" value="<?= $user['id'] ?>">
            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this user?');">Delete</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>
</div>
