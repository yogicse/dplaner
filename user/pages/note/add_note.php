 <?php
// session_start();
$redirect_url = "/user/note.php?source=documents";
if(!isset($_SESSION['username'])){ 
 header('location:../login.php');
 
//  $uid = $session_user_id = get_session_user_id();
}
$uid = $_SESSION['id'];

 if(isset($_POST['add_record'])){
        
        $title = mysqli_real_escape_string($connection , $_POST['title']);
        $notes = mysqli_real_escape_string($connection , $_POST['notes']);
        $query = "INSERT INTO notestable (user_id, title,notes) VALUE ('$uid', '$title', '$notes')";
        $data = mysqli_query($connection, $query);
     

    if ($data) {
        confirmQuery($data);
        $message_success = "Record Added Successfully";
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
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" required>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="form-group">
                <label for="notes">Notes</label>
                <textarea class="form-control" name="notes" id="comment" cols="30" rows="10"></textarea>
            </div>
        </div>

    </div>

   

    <div class="form-row">
        <div class="col-md-12 mb-3">
            <div class="form-group pull-right">
               
                <a class="btn btn-danger" href="note.php">Cancel</a>
                <input class="btn btn-success" type="submit" name="add_record" value="Add Record">
           
            </div>
        </div>
    </div>
</form>

<script>
    initReadonlySample();
</script>