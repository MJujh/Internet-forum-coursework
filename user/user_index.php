<?php
$title = 'Internet Joke Database';
ob_start();
include '../templates/home.html.php';
$output = ob_get_clean();
include '../templates/user_layout.html.php';
