<?php
$redirect_url = "/user/task.php?source=";
    $id = $_GET['id'];
    $select = "SELECT*FROM tasktable WHERE id = $id ";
    $data = mysqli_query($connection, $select);
    $row = mysqli_fetch_array($data);
?>

<form action="" method="post">
    <div class="form-row">

    <div class="form-row">
        <div class="col-md-12 mb-3">
            <div class="form-group">
                <label for="summery">Summery</label>
                <input value="<?php echo $row['summery']?>" type="text" class="form-control" name="summery" required>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="form-group">
                <label for="detail">Detail</label>
                <textarea class="form-control" name="detail" id="comment" cols="30" rows="10"><?php echo $row['detail']?></textarea>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="form-group">
                <label for="spent">Spent</label>
                <input value="<?php echo $row['spent']?>" type="number" class="form-control" name="spent" required>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="form-group">
                <label for="deadline">Deadline</label>
                <input value="<?php echo $row['deadline']?>" type="date" class="form-control" name="deadline" required>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="form-group">
                <label for="estimate">Estimate</label>
                <input value="<?php echo $row['estimate']?>" type="number" class="form-control" name="estimate" required>
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
        $summery = mysqli_real_escape_string($connection, $_POST['summery']);
        $detail = mysqli_real_escape_string($connection, $_POST['detail']);
        $spent = mysqli_real_escape_string($connection, $_POST['spent']);
        $deadline = mysqli_real_escape_string($connection, $_POST['deadline']);
        $estimate = mysqli_real_escape_string($connection, $_POST['estimate']);
        $update = "UPDATE tasktable SET 
            summery   ='$summery',
            detail    ='$detail', 
            spent     ='$spent', 
            deadline  ='$deadline',
            estimate  ='$estimate' WHERE id ='$id'";
        $updated_q = mysqli_query($connection, $update);

        if ($updated_q) {
            confirmQuery($updated_q);
            $message_success = "Task Updated Successfully";
            header("Location: " . $redirect_url . "&msg_success=" . $message_success);
        } else {
            echo "Database error: " . $mysqli_last_error($connection);
        }
}
?>