<?php
session_start();
if(!isset($_SESSION['admin']) || trim($_SESSION['admin']) == '')
{
    header('location: ../admin/index.php');
}



?>