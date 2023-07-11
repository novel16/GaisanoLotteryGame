<?php
session_start();
if(!isset($_SESSION['corp']) || trim($_SESSION['corp']) == '')
{
    header('location: ../corp/corp_index.php');
}



?>