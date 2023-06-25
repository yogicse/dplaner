<?php
//$uid = $_SESSION['id'];
$id = $_GET['id'];
$select = "SELECT*FROM notestable WHERE id = $id ";

$data = mysqli_query($connection, $select);

$row = mysqli_fetch_array($data);
 
?>
<div class="d-grid gap-2 d-md-flex " style="text-align:left">
    <a class="btn btn-info p-2" href="note.php" role="button">Back</a>
   
</div> 

<div class="d-grid gap-2 d-md-flex " style="text-align:right">
    <a class="btn btn-primary p-2" href="note.php?source=add_notes" role="button">Add New</a>
   
    <a class="btn btn-success p-2" href='/user/note.php?id=<?=$row['id']?>&source=edit_notes'><?=edit_icon()?></a>
    <a class="btn btn-danger p-2" href='/user/note.php?id=<?=$row['id']?>&source=delete_notes'><?=delete_icon()?></a>

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


