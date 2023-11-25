<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - MLM</title>

    <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="stylesheet" href="assets/css/main/app-dark.css">
    <link rel="shortcut icon" href="assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/png">
    <link rel="stylesheet" href="assets/css/shared/iconly.css">
    <link rel="stylesheet" href="./assets/extensions/toastify-js/src/toastify.css">
    <script src="./assets/extensions/toastify-js/src/toastify.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://unpkg.com/htmx.org@1.9.5"></script>
</head>

<body>
    <?php
    if (isset($_SESSION['user_email'])) {
        if ($user_type == 'admin') {
        } else {
            echo "<meta http-equiv=\"refresh\" content=\"0; url=./helpers/logout.php\">";
            exit();
        }
    } else {
        echo "<meta http-equiv=\"refresh\" content=\"0; url=./helpers/logout.php\">";
        exit();
    }
    ?>