<?php
$page_url = "/user/task.php?r=1&source=";
$redirect_url = "/user/task.php?r=1&source=";

if(!isset($_SESSION['username'])){ 
    header('location:../login.php');
}

$uid = get_session_user_id(); 
// pagination calculation code
$limit = 2;
$page_number = isset($_GET['page']) ? $_GET['page'] :1;
$offset = ($page_number- 1) * $limit;

$today = date('Y-m-d');
$Yday = date('Y-m-d', strtotime(' +1 day'));



// add limit in select query for pagination
        $query = "SELECT*FROM tasktable WHERE user_id = '$uid' AND deadline >= '$today' && deadline < '$Yday' ORDER BY created_at DESC LIMIT {$offset },{$limit}";
        $data = mysqli_query($connection, $query);
        $result = mysqli_num_rows($data);


// filter code
    $todate = $fromdate = "";
    if(isset($_POST['submit'])) {
        $from = $_POST['from'];
        $fromdate = $from;
        $fromArr = explode("/",$from); 
        $to = $_POST['to'];
        $todate = $to;
        $toArr = explode("/",$to);
        $query = "SELECT*FROM tasktable WHERE user_id = '$uid' AND deadline >= '$from' && deadline < '$to' LIMIT {$offset },{$limit}";
        $data = mysqli_query($connection, $query);
        $result = mysqli_num_rows($data);
}


?>

<div class="d-grid gap-2 d-md-flex " style="text-align:right">
<form class="form-inline my-2 my-lg-0" method="POST">
        <label for="from">From</label>
        <input type="date" id="from" name="from" required value="<?php echo $fromdate ?>">
        <label for="to">to</label>
        <input type="date" id="to" name="to" required value="<?php echo $todate ?>">
        <input type="submit" name="submit" value="Filter" class="btn btn-warning my-2 my-sm-0">
    
    </form>

</div>

<div class="d-grid gap-2 d-md-flex " style="text-align:right">
    <a class="btn btn-primary p-2" href="task.php?source=add_tasks" role="button">Add Task</a>
</div>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th class="text-center">Id</th>
            <th class="text-center">Summery</th>
            <th class="text-center">Estimate</th>
            <th class="text-center">Spent</th>
            <th class="text-center">Action</th>
            <th class="text-center">Deadline</th>
         
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
                <td><?php echo $row['estimate']; ?></td>
                <td><?php echo $row['spent']; ?></td>
                <td class="text-center"><a href='/user/task.php?id=<?=$row['id']?>&source=view_tasks'><?=view_icon()?></a></td>
                <td><?php echo $row['deadline']; ?></td>
               
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
