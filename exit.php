<?php
session_start();
if (isset($_SESSION['user']) == true) {
    session_destroy();
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/");
    exit;
}
