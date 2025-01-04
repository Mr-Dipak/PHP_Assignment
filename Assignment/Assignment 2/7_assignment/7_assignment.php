<?php
session_start();

if (!isset($_SESSION['view_count'])) {
    $_SESSION['view_count'] = 0;
}

$_SESSION['view_count']++;

echo "This page has been viewed " . $_SESSION['view_count'] . " times.";
?>