<?php
session_start();
session_destroy();  // Détruire la session
header("Location: login.php");
exit;
?>
