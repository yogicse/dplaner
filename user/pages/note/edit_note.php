<?php
$redirect_url = "/user/note.php?source=documents";
    $id = $_GET['id'];
    $select = "SELECT*FROM notestable WHERE id = $id ";
    $data = mysqli_query($connection, $select);
    $row = mysqli_fetch_array($data);
?>

<form action="" method="post">
    <div class="form-row">
        <div class="col-md-12 mb-3">
            <div class="form-group">
                <label for="title">Title</label>
                <input value="<?php echo $row['title']?>" type="text" class="form-control" name="title" required>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="form-group">
                <label for="notes">Notes</label>
                <textarea class="form-control" name="notes"  id="comment" cols="30"
                    rows="20"><?php echo $row['notes']?></textarea>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-12 mb-3">
            <div class="form-group pull-right">
                <input class="btn btn-success" type="submit" name="update-btn" value="Update">
            </div>
        </div>
    </div>
</form>

<script>
    initReadonlySample();
</script>

<!-- php code start -->
<?php

if(isset($_POST['update-btn'])){
        $title = mysqli_real_escape_string($connection, $_POST['title']);
        $unotes = mysqli_real_escape_string($connection, $_POST['notes']);
        $update = "UPDATE notestable SET title='$title',notes ='$unotes' WHERE id ='$id'";
        $updated_q = mysqli_query($connection, $update);

        if ($updated_q) {
            confirmQuery($updated_q);
            $message_success = "Record Updated Successfully";
            header("Location: " . $redirect_url . "&msg_success=" . $message_success);
        } else {
            echo "Database error: " . $mysqli_last_error($connection);
        }
}
?>