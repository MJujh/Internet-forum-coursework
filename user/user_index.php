<?php
$title = 'Internet Forum - user Home';
ob_start();
include '../templates/home.html.php';
$output = ob_get_clean();
include '../templates/user_layout.html.php';
