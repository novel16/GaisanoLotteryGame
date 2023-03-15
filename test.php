<?php

$user_pass = "gcap";
$user_pass_verify = password_hash($user_pass, PASSWORD_DEFAULT);

echo $user_pass_verify;

?>