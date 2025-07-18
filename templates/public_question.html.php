<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($question['title']) ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <style>
    body {
      background: #181a1b;
      color: #e6e6e6;
    }
    .main-card {
      background: #23272a;
      border-radius: 20px;
      box-shadow: 0 6px 32px #000a;
    }
    .question-header {
      display: flex;
      align-items: center;
      gap: 1rem;
      padding: 1rem 1.5rem 0 1.5rem;
    }
    .question-avatar {
      width: 48px;
      height: 48px;
      border-radius: 50%;
      background: #333;
      object-fit: cover;
    }
    .question-title {
      font-size: 2rem;
      font-weight: 700;
      margin: 0.5rem 0 0.5rem 0;
      color: #fff;
    }
    .question-meta {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      font-size: 1rem;
      color: #b1b5b9;
    }
    .question-badge {
      background: #d43f3a;
      color: #fff;
      border-radius: 12px;
      padding: 0.2em 0.7em;
      font-size: 0.9em;
      margin-left: 0.5rem;
      border: 1px solid #222;
      font-weight: 500;
      display: inline-block;
    }
    .question-image {
      width: 100%;
      max-width: 600px;
      border-radius: 15px;
      margin: 1rem auto;
      display: block;
      background: #222;
    }
    .question-content {
      padding: 0 1.5rem 0.5rem 1.5rem;
      white-space: pre-line;
      font-size: 1.15rem;
      color: #e6e6e6;
    }
    .post-actions {
      display: flex;
      gap: 1rem;
      padding: 0 1.5rem 1rem 1.5rem;
      margin-top: 0.5rem;
    }
    .post-action-btn {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      background: #23272a;
      border: none;
      color: #e6e6e6;
      border-radius: 20px;
      padding: 0.4rem 1rem;
      font-size: 1.1rem;
      transition: background 0.15s;
    }
    .post-action-btn:hover {
      background: #353a3f;
      color: #fff;
    }
    /* Comment box styles */
    .comment-box-container {
      padding: 0 1.5rem 1.5rem 1.5rem;
    }
    .comment-trigger {
      background: #181a1b;
      color: #e6e6e6;
      border: 1px solid #23272a;
      border-radius: 8px;
      padding: 0.7rem 1rem;
      width: 100%;
      font-size: 1.1rem;
      outline: none;
      cursor: pointer;
      transition: border-color .2s;
    }
    .comment-trigger:focus {
      border-color: #353a3f;
      background: #23272a;
    }
    .comment-box {
      background: #14132b;
      border-radius: 16px;
      border: 1px solid #23272a;
      padding: 0.7rem 1rem 1rem 1rem;
      margin-top: 0.5rem;
      position: relative;
      color: #e6e6e6;
      box-shadow: 0 2px 8px #0003;
    }
    .comment-box textarea {
      background: transparent;
      border: none;
      color: #e6e6e6;
      font-size: 1.1rem;
      width: 100%;
      min-height: 70px;
      resize: vertical;
      outline: none;
      margin-bottom: 0.5rem;
    }
    .comment-toolbar {
      display: flex;
      gap: 1rem;
      align-items: center;
      margin-bottom: 0.7rem;
      color: #b1b5b9;
    }
    .comment-toolbar .bi {
      font-size: 1.3rem;
      cursor: pointer;
    }
    .comment-toolbar .bi:hover {
      color: #fff;
    }
    .comment-actions {
      display: flex;
      gap: 0.6rem;
      justify-content: flex-end;
      margin-top: 0.5rem;
    }
    .btn-cancel {
      background: #29264c;
      color: #fff;
      border: none;
      border-radius: 20px;
      padding: 0.4rem 1rem;
      font-weight: 500;
      transition: background .2s;
    }
    .btn-cancel:hover {
      background: #353a3f;
    }
    .btn-comment {
      background: #2783e0;
      color: #fff;
      border: none;
      border-radius: 20px;
      padding: 0.4rem 1rem;
      font-weight: 500;
      transition: background .2s;
    }
    .btn-comment:hover {
      background: #1565c0;
    }
    @media (max-width: 600px) {
      .main-card { border-radius: 0; }
      .question-image { max-width: 100%; }
    }
  </style>
</head>
<body>
<div class="container py-4">
  <div class="main-card mx-auto shadow" style="max-width:700px;">
    <div class="question-header" style="display: flex; align-items: center; gap: 1rem; padding: 1rem 1.5rem 0 1.5rem;">
      <!-- Back arrow button -->
      <a href="public_questions.php" style="color:#b1b5b9; text-decoration:none; display:flex; align-items:center; font-size:1.5rem; margin-right:0.5rem;">
        <i class="bi bi-arrow-left-circle"></i>
      </a>
      <div>
        <div>
          <span class="fw-bold"><?= htmlspecialchars($question['name']) ?></span>
          <span class="question-meta">• <?= htmlspecialchars($question['date']) ?></span>
          <!-- <span class="question-badge"><?= htmlspecialchars($question['badge']) ?></span> -->
        </div>
        <div class="question-title"><?= htmlspecialchars($question['title']) ?></div>
      </div>
    </div>
    <?php if (!empty($question['img_content'])): ?>
      <img src="../images/<?= htmlspecialchars($question['img_content'], ENT_QUOTES, 'UTF-8') ?>" alt="question image" class="question-image">
    <?php endif; ?>
    <div class="question-content"><?= nl2br(htmlspecialchars($question['text_content'], ENT_QUOTES, 'UTF-8')) ?></div>
    <div class="post-actions">
      <button class="post-action-btn" type="button">
        <i class="bi bi-chat"></i>
      </button>
      <button class="post-action-btn" type="button" id="shareBtn">
        <i class="bi bi-share"></i> Share
      </button>
    </div>
    <div class="comment-box-container">
      <button class="comment-trigger" id="showCommentBox" disabled style="opacity:0.6;cursor:not-allowed;">Join the conversation</button>
      <div id="commentBox" class="comment-box" style="display:block; background: #23272a; color: #b1b5b9;">
        <div class="alert alert-warning py-2 px-3 mb-0" style="font-size:1rem; background:#23272a; border:none; color:#ffc107;">
          Please login to use the comment feature
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  // Share button logic
  document.getElementById('shareBtn').addEventListener('click', function() {
    // Get the current page URL
    const url = window.location.href;
    // Copy to clipboard
    if (navigator.clipboard) {
      navigator.clipboard.writeText(url).then(function() {
        alert('Link copied to clipboard!');
      }, function() {
        alert('Failed to copy link.');
      });
    } else {
      // Fallback for older browsers
      const tempInput = document.createElement('input');
      tempInput.value = url;
      document.body.appendChild(tempInput);
      tempInput.select();
      document.execCommand('copy');
      document.body.removeChild(tempInput);
      alert('Link copied to clipboard!');
    }
  });
</script>
</body>
</html>