<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../questions.css">
    <title><?= $title ?></title>
  </head>
  <body>
    <header><h1>Forum</h1></header>
    <nav>
      <ul>
        <li><a href="../public/public_index.php">Home</a></li>
        <li><a href="../public/public_questions.php">Questions List</a></li>
        <!--<li><a href="author.php">Author List</a></li>
        <li><a href="cate.php">Category List</a></li>
        <li><a href="addjoke.php">Add a new joke</a></li>
        <li><a href="addauthor.php">Add a new author</a></li>
        <li><a href="addcate.php">Add a new category</a></li>-->
        <li><a href="../login/login.html">Login</a></li>
      </ul>
    </nav>
    <main>
      <?= $output ?>
    </main>
    <footer>&copy; IJDB 2023</footer>
  </body>
</html>
