<?php   
session_start(); //pour vous assurer que vous utilisez la même session
session_destroy(); //détruire la session
header("location:/index.php"); //pour rediriger vers "index.php" après la déconnexion
exit();
?>