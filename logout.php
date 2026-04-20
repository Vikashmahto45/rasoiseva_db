<?php
/**
 * RasoiSeva v3.0 - Global Session Termination
 */
session_start();
session_unset();
session_destroy();

header("Location: login.php");
exit;
?>
