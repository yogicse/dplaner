<?php
$page_url = "/user/task.php?r=1&source=documents";
$redirect_url = "/user/task.php?r=1&source=documents";

if(!isset($_SESSION['username'])){ 
    header('location:../login.php');
}

$uid = get_session_user_id();
  
// pagination calculation code
$limit = 2;
$page_number = isset($_GET['page']) ? $_GET['page'] :1;
$offset = ($page_number- 1) * $limit;

// add limit in select query for pagination
        $query = "SELECT*FROM tasktable WHERE user_id = '$uid' ORDER BY created_at DESC LIMIT {$offset },{$limit}";
        $data = mysqli_query($connection, $query);
        $result = mysqli_num_rows($data);



?>


<div class="d-grid gap-2 d-md-flex " style="text-align:right">
    <a class="btn btn-primary p-2" href="task.php?source=add_tasks" role="button">Add Task</a>
</div>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th class="text-center">Id</th>
            <th class="text-center">Summery</th>
            <th class="text-center">Spent</th>
            <th class="text-center">Deadline</th>
            <th class="text-center">Estimate</th>
            <th class="text-center">Action</th>
         
        </tr>
    </thead>
    <tbody>
        <?php
    if($result > 0){
       while($row = mysqli_fetch_array($data)){
        ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['summery']; ?></td>
                <td><?php echo $row['spent']; ?></td>
                <td><?php echo $row['deadline']; ?></td>
                <td><?php echo $row['estimate']; ?></td>
                <td class="text-center"><a href='/user/task.php?id=<?=$row['id']?>&source=view_tasks'><?=view_icon()?></a></td>
          
               
            </tr>
        <?php
       }
    }else{
        ?>
        <tr>
            <td>No Record Found</td>
        </tr>
        <?php
    }
    ?>
      </tbody>   <!-- table code -->
</table>


<?php
        $total_pages = 1;
        $prev =0;
        $next = 0; 
        $sql1 = "SELECT*FROM tasktable WHERE user_id = '$uid'";
        $result1 = mysqli_query($connection,$sql1) or die("Query Failed.");
        if(mysqli_num_rows($result1) > 0){
                $total_records = mysqli_num_rows($result1);
                $total_pages = ceil($total_records / $limit) ?? 1;
                $prev = $page_number - 1;
                $next = $page_number + 1;   
}

 ?>

<div class="row">
    <div class="col-md-12 text-center">
        <?=pagination($page_number,$total_pages,$prev,$next,$redirect_url)?>
    </div>
</div>
