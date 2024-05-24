<?php include("../connections/connection.php");
session_unset();
session_destroy();
header("Location: ../auth/auth");
exit;
