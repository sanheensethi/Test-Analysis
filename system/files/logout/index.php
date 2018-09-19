<?php
session_start();
session_destroy();
$ct=setcookie("id","",time()-86600,"/");
echo "<script>window.location.href='../login_lock'</script>";
?>