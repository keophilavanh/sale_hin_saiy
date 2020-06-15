<?php
session_start();
unset($_SESSION['ses_id']);
unset($_SESSION['Username']);
session_destroy();
header('Location: index.php');
?>