<?php
session_start();
session_destroy();
$ct=setcookie("id","",time()-86600,"/");
header("Location: ../login/");
?>