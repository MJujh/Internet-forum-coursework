<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($question['title']) ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <style>
    .sidebar {
      background: #141516;
      min-height: 100vh;
      color: #b1b5b9;
      transition: width 0.3s;
      width: 250px;
      overflow-x: hidden;
    }
    .sidebar.collapsed {
      width: 70px;
    }
    .sidebar .nav-link,
    .sidebar .navbar-brand {
      color: #b1b5b9;
      white-space: nowrap;
    }
    .sidebar .nav-link.active {
      background: #23272a;
      color: #fff;
    }
    .sidebar.collapsed .nav-link span,
    .sidebar.collapsed .navbar-brand,
    .sidebar.collapsed .footer {
      display: none;
    }
    .sidebar.collapsed .main-header img {
      margin-right: 0;
    }
    .sidebar .main-header img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      margin-right: 10px;
    }
    @media (max-width: 768px) {
      .sidebar {
        width: 70px;
      }
      .sidebar .nav-link span,
      .sidebar .navbar-brand,
      .sidebar .footer {
        display: none;
      }
    }
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
<div class="container-fluid">
  <div class="row flex-nowrap">
    <!-- Sidebar -->
    <div id="sidebar" class="col-auto col-md-3 col-xl-2 px-0 sidebar d-flex flex-column">
      <div class="d-flex align-items-center p-3 main-header">
        <img src="../images/redditicon.png" alt="Logo" style="width: 40px; height: 40px; border-radius: 50%; margin-right: 10px;">
        <span class="navbar-brand fw-bold" style="color: #b1b5b9;">Admin Panel</span>
        <button class="collapse-btn ms-auto" id="collapseSidebarBtn" aria-label="Toggle sidebar">
          <i class="bi bi-list" style="font-size: 1.5rem; color: #b1b5b9;"></i>
        </button>
      </div>
      <nav class="flex-grow-1">
        <ul class="nav flex-column pt-3">
          <li class="nav-item mb-2">
            <a class="nav-link" href="admin_index.php" style="color: #b1b5b9;">
              <i class="bi bi-house-door" style="font-size: 1.2rem; color: #b1b5b9;"></i> <span style="color: #b1b5b9;">Home</span>
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link active" href="admin_questions.php" style="color: #fff; background: #23272a;">
              <i class="bi bi-list-ul" style="font-size: 1.2rem; color: #fff;"></i> <span style="color: #fff;">Question List</span>
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link" href="addquestion.php" style="color: #b1b5b9;">
              <i class="bi bi-plus-circle" style="font-size: 1.2rem; color: #b1b5b9;"></i> <span style="color: #b1b5b9;">Ask a new question</span>
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link" href="admin_dm.php" style="color: #b1b5b9;">
              <i class="bi bi-envelope" style="font-size: 1.2rem; color: #b1b5b9;"></i> <span style="color: #b1b5b9;">Admin messages</span>
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link" href="admin_module.php" style="color: #b1b5b9;">
              <i class="bi bi-collection" style="font-size: 1.2rem; color: #b1b5b9;"></i> <span style="color: #b1b5b9;">Module List</span>
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link" href="addmodule.php" style="color: #b1b5b9;">
              <i class="bi bi-plus-square" style="font-size: 1.2rem; color: #b1b5b9;"></i> <span style="color: #b1b5b9;">Add a new module</span>
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link" href="user.php" style="color: #b1b5b9;">
              <i class="bi bi-people" style="font-size: 1.2rem; color: #b1b5b9;"></i> <span style="color: #b1b5b9;">Manage users</span>
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link" href="../login/Logout.php" style="color: #b1b5b9;">
              <i class="bi bi-box-arrow-right" style="font-size: 1.2rem; color: #b1b5b9;"></i> <span style="color: #b1b5b9;">Public site/Logout</span>
            </a>
          </li>
        </ul>
      </nav>
      <div class="footer mt-auto" style="color: #b1b5b9;">
        &copy; IJDB 2023
      </div>
    </div>
    <!-- Main Content -->
    <div class="col py-0 main-content">
      <div class="container py-4">
        <div class="main-card mx-auto shadow" style="max-width:700px;">
          <div class="question-header" style="display: flex; align-items: center; gap: 1rem; padding: 1rem 1.5rem 0 1.5rem;">
            <!-- Back arrow button -->
            <a href="admin_questions.php" style="color:#b1b5b9; text-decoration:none; display:flex; align-items:center; font-size:1.5rem; margin-right:0.5rem;">
              <i class="bi bi-arrow-left-circle"></i>
            </a>
            <div style="width:36px;height:36px;border-radius:50%;background:#23272a;display:flex;align-items:center;justify-content:center;"></div>
            <div style="display: flex; flex-direction: column;">
              <div style="display: flex; align-items: center; gap: 0.5rem;">
                <span class="fw-bold"><?= htmlspecialchars($question['name']) ?></span>
                <span class="question-meta">• <?= htmlspecialchars($question['date']) ?></span>
              </div>
              <!-- Module tag -->
              <span style="display:inline-block;background:#353a3f;color:#8ecae6;font-size:0.95rem;padding:2px 10px;border-radius:8px;margin-bottom:0.3rem;width:fit-content;">
                <?= htmlspecialchars($question['module_name']) ?>
              </span>
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
            <button class="comment-trigger" id="showCommentBox" style="opacity:1;cursor:pointer;">Join the conversation</button>
            <div id="commentBox" class="comment-box" style="display:none; background: #131225; color: #b1b5b9; border: 1px solid #6b6b8d;">
              <form method="post" action="_question.php?id=<?= urlencode($question['id']) ?>" enctype="multipart/form-data" style="margin:0;">
                <div style="position:relative;">
                  <textarea name="comment" placeholder="Write your comment..." required
                    style="background:transparent; border:none; color:#e6e6e6; font-size:1.1rem; width:100%; min-height:70px; resize:vertical; outline:none; margin-bottom:0.5rem; padding:10px 0 0 8px;"></textarea>
                </div>
                <!-- Move image upload button to the actions row -->
                <div class="comment-actions" style="display:flex;align-items:center;gap:0.6rem;justify-content:flex-end;margin-top:0.5rem;">
                  <div style="margin-right:auto;display:flex;align-items:center;gap:10px;">
                    <label for="comment-image" style="cursor:pointer;display:flex;align-items:center;gap:4px;">
                      <i class="bi bi-image" style="font-size:1.3rem;"></i>
                      <input type="file" id="comment-image" name="img_content" accept="image/*" style="display:none" onchange="previewCommentImage(event)">
                    </label>
                    <span id="image-preview-container" style="display:flex;align-items:center;">
                      <img id="comment-image-preview" src="" alt="" style="display:none;max-height:40px;border-radius:6px;">
                      <button type="button" id="remove-image-btn" style="display:none;margin-left:6px;background:none;border:none;color:#e74c3c;font-size:1.3rem;cursor:pointer;" title="Remove image">
                        <i class="bi bi-x-circle-fill"></i>
                      </button>
                    </span>
                  </div>
                  <button type="button" class="btn-cancel" id="cancelComment" style="background:#29264c;color:#fff;border:none;border-radius:20px;padding:0.4rem 1rem;font-weight:500;">Cancel</button>
                  <button type="submit" class="btn-comment" style="background:#2783e0;color:#fff;border:none;border-radius:20px;padding:0.4rem 1rem;font-weight:500;">Comment</button>
                </div>
                <!-- Image preview -->
              </form>
            </div>
          </div>
          <!-- Display comments below the comment box -->
          <div class="comments-list" style="margin-top:1.5rem;">
            <?php
              // Fetch comments for this question
              $stmt = $pdo->prepare('SELECT c.*, u.name FROM comment c JOIN user u ON c.user_id = u.id WHERE c.question_id = :qid ORDER BY c.date DESC, c.id DESC');
              $stmt->execute([':qid' => $question['id']]);
              $comments = $stmt->fetchAll();
            ?>
            <?php if ($comments): ?>
              <?php foreach ($comments as $comment): ?>
                <div class="comment-item" style="background:#181a1b;border-radius:10px;padding:0.8rem 1rem;margin-bottom:1rem;box-shadow:0 1px 4px #0002;">
                  <div style="display:flex;align-items:center;gap:0.7rem;">
                    <div>
                      <span style="font-weight:600;color:#fff;"><?= htmlspecialchars($comment['name']) ?></span>
                      <span style="color:#b1b5b9;font-size:0.95rem;margin-left:0.5rem;"><?= htmlspecialchars($comment['date']) ?></span>
                    </div>
                  </div>
                  <div style="margin-top:0.5rem;white-space:pre-line;color:#e6e6e6;">
                    <?= nl2br(htmlspecialchars($comment['text_content'])) ?>
                  </div>
                  <?php if (!empty($comment['img_content'])): ?>
                    <div style="margin-top:0.7rem;">
                      <img src="../images/<?= htmlspecialchars($comment['img_content'], ENT_QUOTES, 'UTF-8') ?>" alt="comment image" style="max-width:180px;border-radius:8px;">
                    </div>
                  <?php endif; ?>
                  <!-- Admin delete comment button -->
                  <form method="post" action="admin_question.php?id=<?= urlencode($question['id']) ?>" style="display:inline;">
                    <input type="hidden" name="delete_comment_id" value="<?= $comment['id'] ?>">
                    <button type="submit" class="btn btn-sm btn-outline-danger mt-2" onclick="return confirm('Delete this comment?');">
                      <i class="bi bi-trash"></i> Delete
                    </button>
                  </form>
                </div>
              <?php endforeach; ?>
            <?php else: ?>
              <div style="color:#b1b5b9;text-align:center;margin-top:1.5rem;">No comments yet. Be the first to comment!</div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Bootstrap JS and Icons -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<script>
  const sidebar = document.getElementById('sidebar');
  const collapseBtn = document.getElementById('collapseSidebarBtn');
  collapseBtn.addEventListener('click', () => {
    sidebar.classList.toggle('collapsed');
  });
</script>
<?php echo "<!-- question['id']: {$question['id']} -->"; ?>
<script>
  // Show comment box when button is clicked
  document.getElementById('showCommentBox').addEventListener('click', function() {
    document.getElementById('commentBox').style.display = 'block';
    this.style.display = 'none';
  });

  // Cancel button hides the comment box and shows the trigger again
  document.getElementById('cancelComment').addEventListener('click', function(e) {
    e.preventDefault();
    document.getElementById('commentBox').style.display = 'none';
    document.getElementById('showCommentBox').style.display = 'block';
    // Reset textarea and image preview
    document.querySelector('textarea[name="comment"]').value = '';
    document.getElementById('comment-image-preview').style.display = 'none';
    document.getElementById('comment-image-preview').src = '';
    document.getElementById('comment-image').value = '';
    document.getElementById('remove-image-btn').style.display = 'none';
  });

  // Image preview logic with remove button
  function previewCommentImage(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('comment-image-preview');
    const removeBtn = document.getElementById('remove-image-btn');
    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        preview.src = e.target.result;
        preview.style.display = 'inline-block';
        removeBtn.style.display = 'inline-block';
      };
      reader.readAsDataURL(file);
    } else {
      preview.src = '';
      preview.style.display = 'none';
      removeBtn.style.display = 'none';
    }
  }

  // Remove image button logic
  document.getElementById('remove-image-btn').addEventListener('click', function() {
    document.getElementById('comment-image').value = '';
    document.getElementById('comment-image-preview').src = '';
    document.getElementById('comment-image-preview').style.display = 'none';
    this.style.display = 'none';
  });

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