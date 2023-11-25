<?php
include('../connections/connection.php');
include('../connections/functions.php');
include('../connections/global.php');
$user_id = $_GET['user_id'];
sendEMail($user_id);
refresh('../dashboard.php', 0);
