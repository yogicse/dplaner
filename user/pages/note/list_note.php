<?php
$page_url = "/user/note.php?r=1&source=documents";
$redirect_url = "/user/note.php?r=1&source=documents";

if(!isset($_SESSION['username'])){ 
    header('location:../login.php');
}

$uid = get_session_user_id();
    
// pagination calculation code

$limit = 2;
$page_number = isset($_GET['page']) ? $_GET['page'] :1;
$offset = ($page_number- 1) * $limit;

// add limit in select query for pagination
$query = "SELECT*FROM notestable WHERE user_id = '$uid' LIMIT {$offset },{$limit}";
$data = mysqli_query($connection, $query);
$result = mysqli_num_rows($data);


//for search div
if(isset($_POST['search'])){
    $keyword = $_POST['keyword'];
    $query = "SELECT*FROM notestable WHERE user_id = '$uid' AND `title` LIKE '%$keyword%' ORDER BY `title` LIMIT {$offset },{$limit}";
    $data = mysqli_query($connection, $query);
    $result = mysqli_num_rows($data);
}
   

// filter code
$todate = $fromdate = "";
if(isset($_POST['submit'])) {
    $from = $_POST['from'];
    $fromdate = $from;
    $fromArr = explode("/",$from); 
    $to = $_POST['to'];
    $todate = $to;
    $toArr = explode("/",$to);
    $query = "SELECT*FROM notestable WHERE user_id = '$uid' AND created_at >= '$from' && created_at < '$to' LIMIT {$offset },{$limit}";
    $data = mysqli_query($connection, $query);
    $result = mysqli_num_rows($data);
}
?>


<h2 class="text-center">Notes list</h2>

<div class="search-filter">
    <form class="form-inline my-2 my-lg-0" method="POST">
        <label for="from">From</label>
        <input type="date" id="from" name="from" required value="<?php echo $fromdate ?>">
        <label for="to">to</label>
        <input type="date" id="to" name="to" required value="<?php echo $todate ?>">
        <input type="submit" name="submit" value="Filter" class="btn btn-warning my-2 my-sm-0">
    </form>

    <form action="" method='post'>
        <input class="form-control-warning mr-sm-2" type="search" placeholder="Search" name="keyword"
            aria-label="Search">
        <button class="btn btn-success my-2 my-sm-0" type="submit" name="search" value="search">Search</button>
    </form>
</div>

<div class="d-grid gap-2 d-md-flex " style="text-align:right">
    <a class="btn btn-primary p-2" href="note.php?source=add_notes" role="button">Add New</a>
</div>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Notes</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th colspan='2'>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
    if($result > 0){
       while($row = mysqli_fetch_array($data)){
        ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['notes']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td><?php echo $row['updated_at']; ?></td>
            <td><a href='/user/note.php?id=<?=$row['id']?>&source=edit_notes'><?=edit_icon()?></a></td>
            <td><a href='/user/note.php?id=<?=$row['id']?>&source=delete_notes'><?=delete_icon()?></a></td>
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
        <!-- table code -->
</table>


<?php
    $total_pages = 1;
    $prev =0;
    $next = 0; 
    $sql1 = "SELECT*FROM notestable WHERE user_id = '$uid'";
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
