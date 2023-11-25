<?php
if (isset($_SESSION['user_email'])) {

  $fetch_all_query = "SELECT * FROM user_data WHERE user_email = '" . $_SESSION['user_email'] . "'";
  $result = mysqli_query($conn, $fetch_all_query);

  while ($rows = mysqli_fetch_assoc($result)) {
    $user_id = $rows['id'];
    $user_type = $rows['user_type'];
    $username = $rows['user_name'];
    $email = $rows['user_email'];
  }
}
