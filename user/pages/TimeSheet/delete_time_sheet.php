    <?php
        $redirect_url="/user/time_sheet.php?source=list";
            $id = $_GET['id'];

            $queryd = "DELETE FROM time_sheet_detail WHERE id = '$id'";

            $d = mysqli_query($connection, $queryd);

        if($d){
            
            $message_success = "Record Deleted Successfully";
            header("Location: " . $redirect_url . "&msg_success=" . $message_success);
        }
    else{

        echo "Database error: " . $pg_last_error($connection);
    }

    ?>