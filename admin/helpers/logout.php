<?php include("../connection/connection");
session_start();
session_unset();
session_destroy();
header("Location: ../auth/login");
