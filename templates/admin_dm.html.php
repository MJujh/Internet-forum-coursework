<p><?=$totalMessages?> messages have been received.</p>

<div class="row">
<?php foreach ($messages as $message): ?>
  <div class="col-12 mb-3">
    <div class="card bg-dark text-light shadow-sm h-100">
      <div class="card-body">
        <p class="card-text mb-2"><?= htmlspecialchars($message['message'], ENT_QUOTES, 'UTF-8') ?></p>
        <small class="text-secondary">Sent on: <?= htmlspecialchars($message['date'], ENT_QUOTES, 'UTF-8'); ?></small>
        <div class="mt-3">
          <form action="deletedm.php" method="post" style="display:inline;">
            <input type="hidden" name="id" value="<?= $message['id'] ?>">
            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this message?');">Delete</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>
</div>