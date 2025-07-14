<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../questions.css">
    <title><?= $title ?></title>
  </head>
  <body>
    <header><h1>Internet Joke Database</h1></header>
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
       <!-- <li><a href="jokes.php">Jokes List</a></li>
        <li><a href="cate.php">Category List</a></li>-->
        <li><a href="questions.php">Question List</a></li>
        <li><a href="addquestion.php">Ask a new question</a></li>
        <li><a href="addmodule.php">Add a new module</a></li>
        <li><a href="login/Logout.php">Public site/Logout</a></li>
      </ul>
    </nav>
    <main>
      <?= $output ?>
    </main>
    <footer>&copy; IJDB 2023</footer>
  </body>
</html>
