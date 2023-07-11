<?php
session_start();
unset($_SESSION['corp']);

header('location: corp_index.php');

?>