<?php
$id = $_GET['id'];
$redirect_url = "/user/note.php?source=documents";
$queryd = "DELETE FROM notestable WHERE id = '$id'";

$delete_q = mysqli_query($connection, $queryd);

if ($delete_q ) {
    confirmQuery($delete_q );
    $message_success = "Record Deleted Successfully";
    header("Location: " . $redirect_url . "&msg_success=" . $message_success);
} else {
    echo "Database error: " . $mysqli_last_error($connection);
}

?>