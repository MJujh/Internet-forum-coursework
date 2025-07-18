<!-- Filter form -->
<form method="get" class="mb-3">
  <label for="module" class="text-light me-2">Filter by module:</label>
  <select name="module" id="module" onchange="this.form.submit()" style="padding:4px 10px;border-radius:6px;">
    <option value="">All Modules</option>
    <?php foreach ($modules as $module): ?>
      <option value="<?= htmlspecialchars($module['id']) ?>" <?= (isset($selectedModule) && $selectedModule == $module['id']) ? 'selected' : '' ?>>
        <?= htmlspecialchars($module['Mname']) ?>
      </option>
    <?php endforeach; ?>
  </select>
</form>

<p class="text-light"><?=$totalQuestions?> questions have been submitted to the forum.</p>

<div class="row">
<?php foreach ($questions as $question): ?>
  <div class="col-12 mb-3">
    <a href="admin_question.php?id=<?= htmlspecialchars($question['id']) ?>" style="text-decoration:none;">
    <div class="card bg-dark text-light shadow-sm h-100" style="cursor:pointer;">
      <div class="card-body d-flex align-items-center">
        <?php if (!empty($question['img_content'])): ?>
          <img height="100px" class="me-3 rounded" src="../images/<?= htmlspecialchars($question['img_content'], ENT_QUOTES,'UTF-8'); ?>" alt="question image"/>
        <?php endif; ?>
        <div>
          <!-- Module tag -->
          <span style="display:inline-block;background:#353a3f;color:#8ecae6;font-size:0.85rem;padding:2px 10px;border-radius:8px;margin-bottom:0.3rem;width:fit-content;">
            <?= htmlspecialchars($question['Mname']) ?>
          </span>
          <p class="card-text mb-2"><?= htmlspecialchars($question['text_content'], ENT_QUOTES, 'UTF-8') ?></p>
          <small class="text-secondary">by 
            <a href="mailto:<?= htmlspecialchars($question['email'], ENT_QUOTES, 'UTF-8'); ?>" class="text-secondary">
              <?= htmlspecialchars($question['name'], ENT_QUOTES, 'UTF-8'); ?>
            </a>
          </small>
          <!-- Admin actions -->
          <div class="d-flex align-items-center mt-3 gap-2">
            <a href="editquestion.php?id=<?= $question['id'] ?>" class="btn btn-sm btn-outline-warning px-2">Edit</a>
            <form action="deletequestion.php" method="post" style="display:inline;">
              <input type="hidden" name="id" value="<?= $question['id'] ?>">
              <button type="submit" class="btn btn-sm btn-outline-danger px-2" onclick="return confirm('Are you sure you want to delete this question?');">Delete</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>
</div>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
