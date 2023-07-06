<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Add notes</h2>
</body>
</html> -->

<?php

// $table_name = "documents";
// $redirect_url = "/client/court.php?source=documents";
// $session_user_id = get_session_user_id();
// $agent_id = get_client_agent_id($session_user_id);

// if (isset($_POST['add_record'])) {

//     $title = pg_escape_string($_POST['title']);
//     $status = pg_escape_string($_POST['status']);

//     $current_date_time = get_current_date_time();

//     $path = upload_documents("path",$session_user_id,"documents/");

//     $query = "INSERT INTO " . $table_name . "(user_id,
//                                             client_id,
//                                             agent_id,
//                                               title,
//                                               path,
//                                               status,
//                                               created_at,
//                                               updated_at) ";

//     $query .= "VALUES('". $session_user_id ."',
//     '". $session_user_id ."',
//     '". $agent_id ."',
//                       '" . $title . "',
//                       '" . $path . "',
//                       '" . $status . "',
//                       '" . $current_date_time . "',
//                       '" . $current_date_time . "')";



//     $add_record_query = pg_query($connection, $query);

//     if ($add_record_query) {
//         confirmQuery($add_record_query);
//         $message_success = "Record Added Successfully";
//         header("Location: " . $redirect_url . "&msg_success=" . $message_success);
//     } else {
//         echo "Database error: " . $pg_last_error($connection);
//     }
// }
?>

    <!-- insert query -->
    <?php
// session_start();
if(!isset($_SESSION['username'])){ 
 header('location:../login.php');
 
//  $uid = $session_user_id = get_session_user_id();
}
$uid = $_SESSION['id'];


    if(isset($_POST['add_record'])){
        
        // $uid = mysqli_real_escape_string($con , $_POST['user_id']);
        $title = mysqli_real_escape_string($connection , $_POST['title']);
        $notes = mysqli_real_escape_string($connection , $_POST['notes']);

         $query = "INSERT INTO notestable (user_id, title,notes) VALUE ('$uid', '$title', '$notes')";
        
       $data = mysqli_query($connection, $query);
       if($data){
        ?>
          <script type = "text/javascript">
            alert ("Data save succesfully");
        </script>
        <?php
      }else{
        ?>
          <script type = "text/javascript">
            alert ("No record found please try again");
        </script>
        <?php
    }


    }
    
    
    
    ?>




<form action="" method="post" >
<h2>Add Notes </h2>
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
                <textarea class="form-control" name="notes" id="" cols="30" rows="10"></textarea>
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