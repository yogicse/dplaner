<?php
$redirect_url = "/user/note.php?source=";
// print_r($_GET);
$user_id = $_GET['id'];
$note_id = $_GET['note_id'];

$send_query = "INSERT INTO share_note (user_id, note_id) VALUE ('$user_id', '$note_id')";
$data = mysqli_query($connection, $send_query);

if ($data) {
    confirmQuery($data);
    $message_success = "Your Record Send Successfully";
    header("Location: " . $redirect_url . "&msg_success=" . $message_success);
} else {
    echo "Database error: " . $mysqli_last_error($connection);
}

?>