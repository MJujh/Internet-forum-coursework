<p class="text-light"><?=$totalQuestions?> questions have been submitted to the forum.</p>

<div class="row">
<?php foreach ($questions as $question): ?>
  <div class="col-12 mb-3">
    <a href="public_question.html.php?id=<?= htmlspecialchars($question['id']) ?>" style="text-decoration:none;">
      <div class="card bg-dark text-light shadow-sm h-100" style="cursor:pointer;">
        <div class="card-body d-flex align-items-center">
          <?php if (!empty($question['img_content'])): ?>
            <img height="100px" class="me-3 rounded" src="../images/<?= htmlspecialchars($question['img_content'], ENT_QUOTES,'UTF-8'); ?>" alt="question image"/>
          <?php endif; ?>
          <div>
            <p class="card-text mb-2"><?= htmlspecialchars($question['text_content'], ENT_QUOTES, 'UTF-8') ?></p>
            <small class="text-secondary">by <?= htmlspecialchars($question['name'], ENT_QUOTES, 'UTF-8'); ?></small>
            <!-- Post actions bar -->
            <div class="d-flex align-items-center mt-3 gap-2">
              <button type="button" class="btn btn-sm btn-outline-secondary d-flex align-items-center px-2" style="background:#23272a;border:none;">
                <i class="bi bi-arrow-up"></i>
                <span class="mx-1"><?= isset($question['votes']) ? htmlspecialchars($question['votes']) : '1.3K' ?></span>
                <i class="bi bi-arrow-down"></i>
              </button>
              <button type="button" class="btn btn-sm btn-outline-secondary d-flex align-items-center px-2" style="background:#23272a;border:none;">
                <i class="bi bi-chat"></i>
                <span class="mx-1"><?= isset($question['comments']) ? htmlspecialchars($question['comments']) : '105' ?></span>
              </button>
              <button type="button" class="btn btn-sm btn-outline-secondary d-flex align-items-center px-2" style="background:#23272a;border:none;">
                <i class="bi bi-person"></i>
              </button>
              <button type="button" class="btn btn-sm btn-outline-secondary d-flex align-items-center px-2" style="background:#23272a;border:none;">
                <i class="bi bi-share"></i>
                <span class="mx-1">Share</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </a>
  </div>
<?php endforeach; ?>
</div>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">