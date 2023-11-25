<?php
include("../connections/connection.php");

$drop_all_tables = "DROP TABLE `wallet`,`request_recharge`, `user_data`";

$conn->query($drop_all_tables);

if (mysqli_query($conn, $drop_all_tables)) {
    echo "TABLE DROPPED SUCCESSFULLY";
} else {
    echo "TABLE DROPPED UNSUCCESSFULLY";
}
