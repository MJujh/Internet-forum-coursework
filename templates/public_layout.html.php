<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title><?= $title ?></title>
    <style>
      body {
        background-color: #181a1b;
        color: #e6e6e6;
      }
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
      .main-header {
        background: #23272a;
        margin-bottom: 0;
      }
      .main-header h1 {
        font-size: 2rem;
        margin: 0;
        color: #fff;
      }
      .main-content {
        background: #181a1b;
        min-height: 100vh;
        padding: 2rem;
      }
      .card {
        background: #23272a;
        color: #e6e6e6;
        transition: box-shadow 0.2s;
        border: none;
        margin-bottom: 1rem;
        cursor: pointer;
      }
      .card:hover {
        box-shadow: 0 0 0.5rem #fff2, 0 4px 20px #1116;
        background: #2a2d30;
        color: #fff;
      }
      .footer {
        background: #141516;
        color: #b1b5b9;
        text-align: center;
        padding: 1rem 0;
        margin-top: 2rem;
        border-top: 1px solid #23272a;
      }
      a {
        text-decoration: none;
        color: unset;
      }
      a:hover {
        color: unset;
      }
      .collapse-btn {
        background: none;
        border: none;
        color: #b1b5b9;
        font-size: 1.5rem;
        margin-left: 10px;
        cursor: pointer;
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
    </style>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row flex-nowrap">
        <!-- Sidebar -->
        <div id="sidebar" class="col-auto col-md-3 col-xl-2 px-0 sidebar d-flex flex-column">
          <div class="d-flex align-items-center p-3 main-header">
            <img src="../images/redditicon.png" alt="Logo">
            <span class="navbar-brand fw-bold">Forum</span>
            <button class="collapse-btn ms-auto" id="collapseSidebarBtn" aria-label="Toggle sidebar">
              <i class="bi bi-list"></i>
            </button>
          </div>
          <nav class="flex-grow-1">
            <ul class="nav flex-column pt-3">
              <li class="nav-item mb-2">
                <a class="nav-link active" href="../public/public_index.php">
                  <i class="bi bi-house-door"></i> <span>Home</span>
                </a>
              </li>
              <li class="nav-item mb-2">
                <a class="nav-link" href="../public/public_questions.php">
                  <i class="bi bi-list-ul"></i> <span>Questions List</span>
                </a>
              </li>
              <li class="nav-item mb-2">
                <a class="nav-link" href="../login/login.html">
                  <i class="bi bi-box-arrow-in-right"></i> <span>Login</span>
                </a>
              </li>
              <li class="nav-item mb-2">
                <a class="nav-link" href="../register/register.html">
                  <i class="bi bi-person-plus"></i> <span>Register</span>
                </a>
              </li>
            </ul>
          </nav>
          <div class="footer mt-auto">
            &copy; IJDB 2023
          </div>
        </div>
        <!-- Main Content -->
        <div class="col py-0 main-content">
          <div class="container">
<!--              Question list as clickable cards -->
            <?php if (isset($questions) && is_array($questions)): ?>
              <?php foreach ($questions as $question): ?>
                <a href="public_question.php>">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title"><?= htmlspecialchars($question['title']) ?></h5>
                      <p class="card-text"><?= htmlspecialchars($question['text-content']) ?></p>
                    </div>
                  </div>
                </a>
              <?php endforeach; ?>
            <?php else: ?>
              <?= $output ?>
            <?php endif; ?> 
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
  </body>
</html>