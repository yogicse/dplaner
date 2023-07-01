<?php
//$uid = $_SESSION['id'];
$id = $_GET['id'];
$select = "SELECT*FROM tasktable WHERE id = $id ";

$data = mysqli_query($connection, $select);

$row = mysqli_fetch_array($data);
 
?>
<div class="d-grid gap-2 d-md-flex " style="text-align:left">
    <a class="btn btn-info p-2" href="task.php" role="button">Back</a>
    
</div> 

<div class="d-grid gap-2 d-md-flex " style="text-align:right">
    <a class="btn btn-primary p-2" href="task.php?source=add_tasks" role="button">Add Task</a>
   
    <a class="btn btn-success p-2" href='/user/task.php?id=<?=$row['id']?>&source=edit_tasks'><?=edit_icon()?></a>
    <a class="btn btn-danger p-2" href='/user/task.php?id=<?=$row['id']?>&source=delete_tasks'><?=delete_icon()?></a>
    
</div> 

 <div >
    <hr>
    <div class="form-row">
        <div class="col-md-12 mb-3">
            <div class="form-group">
                <label for="summery">Title</label>
                <?php echo $row['summery'];?>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="form-group">
                <label for="detail">Notes</label>
               <?php echo $row['detail'];?>
            </div>
        </div>
</div>


