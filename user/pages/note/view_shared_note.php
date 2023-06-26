<?php

$uid = get_session_user_id();
$id = $_GET['id'];
$query = "SELECT*FROM notestable LEFT JOIN share_note
ON notestable.id = share_note.note_id
WHERE share_note.user_id = '$uid'";

$data = mysqli_query($connection, $query);
$result = mysqli_num_rows($data);

$row = mysqli_fetch_array($data);

?>
<div class="d-grid gap-2 d-md-flex " style="text-align:left">
    <a class="btn btn-info p-2" href="note.php" role="button">Back</a>
    
</div> 


 <div >
    <hr>
    <div class="form-row">
        <div class="col-md-12 mb-3">
            <div class="form-group">
                <label for="title">Title</label>
                <?php echo $row['title'];?>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="form-group">
                <label for="notes">Notes</label>
               <?php echo $row['notes'];?>
            </div>
        </div>
</div>


