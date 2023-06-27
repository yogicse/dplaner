<?php
// session_start();
$redirect_url = "/user/task.php?source=documents";
if(!isset($_SESSION['username'])){ 
 header('location:../login.php');
 
//  $uid = $session_user_id = get_session_user_id();
}
$uid = $_SESSION['id'];

 if(isset($_POST['add_task'])){
        
        $summery = mysqli_real_escape_string($connection , $_POST['summery']);
        $detail = mysqli_real_escape_string($connection , $_POST['detail']);
        $spent = mysqli_real_escape_string($connection , $_POST['spent']);
        $deadline = mysqli_real_escape_string($connection , $_POST['deadline']);
        $estimate = mysqli_real_escape_string($connection , $_POST['estimate']);
       
       
        $query = "INSERT INTO tasktable (user_id, summery, detail,spent,deadline,estimate) VALUE ('$uid','$summery', '$detail', '$spent','$deadline','$estimate')";
        $data = mysqli_query($connection, $query);
     

    if ($data) {
        confirmQuery($data);
        $message_success = "task Added Successfully";
        header("Location: " . $redirect_url . "&msg_success=" . $message_success);
    } else {
        echo "Database error: " . $mysqli_last_error($connection);
    }
    
    }

    ?>

<!-- add notes form -->
<form action="" method="post" >

<div class="form-row">

    <div class="form-row">
        <div class="col-md-12 mb-3">
            <div class="form-group">
                <label for="summery">Summery</label>
                <input type="text" class="form-control" name="summery" required>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="form-group">
                <label for="detail">Detail</label>
                <textarea class="form-control" name="detail" id="comment" cols="30" rows="10"></textarea>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="form-group">
                <label for="spent">Spent</label>
                <input type="number" class="form-control" name="spent" required>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="form-group">
                <label for="deadline">Deadline</label>
                <input type="date" class="form-control" name="deadline" required>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="form-group">
                <label for="estimate">Estimate</label>
                <input type="number" class="form-control" name="estimate" required>
            </div>
        </div>

    </div>

   

    <div class="form-row">
        <div class="col-md-12 mb-3">
            <div class="form-group pull-right">
               
                <a class="btn btn-danger" href="task.php">Cancel</a>
                <input class="btn btn-success" type="submit" name="add_task" value="Add Task">
           
            </div>
        </div>
    </div>
</form>

<script>
    initReadonlySample();
</script>