<?php
include("./connections/connection.php");
include("./connections/global.php");
include("./connections/functions.php");


getLeftUsers(25, $conn, 1, 'right');
function getLeftUsers($count, $conn, $child_id, $location)
{
    // Base case: If count reaches 0, stop the recursion
    if ($count <= 0) {
        return;
    }

    $get_member = mysqli_query($conn, "SELECT * FROM `mlm_tree` WHERE parent_id = '$child_id' AND child_location = '$location'");
    while ($rows = mysqli_fetch_assoc($get_member)) {
        echo $child_id = $rows['child_id'];
        $get_member_left_details = mysqli_query($conn, "SELECT * FROM `user_data` WHERE id = '$child_id'");
        while ($rows = mysqli_fetch_assoc($get_member_left_details)) {
            echo $child_name = $rows['user_name'];
            echo $child_id = $rows['id'];
            getLeftUsers($count - 1, $conn, $child_id, $location);
        }
    }
    // Recursive call with decreased count
}
