<?php
session_start();
session_destroy();
header("Location: ../public/public_index.php");
?>