
<div class="container mt-4 mb-4">
  <h2 class="mb-3">Edit User</h2>
  <form action="" method="post">
    <input type="hidden" name="user_id" value="<?= htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8') ?>">
    <div class="mb-3">
      <label for="name" class="form-label">Edit user name here:</label>
      <textarea name="name" id="name" rows="3" class="form-control" required><?= htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8') ?></textarea>
    </div>
    <button type="submit" name="submit" class="btn btn-warning">Save</button>
  </form>
</div>
