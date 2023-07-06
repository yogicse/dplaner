<?php


if(!isset($_SESSION['username'])){ 
    header('location:../login.php');
    
   //  $uid = $session_user_id = get_session_user_id();
   }
   $uid = $_SESSION['id'];

    
    // pagination calculation code
    $limit = 2;
    
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = 1;
    }
    $offset = ($page - 1) * $limit;

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

if(isset($_POST['submit'])){

  $from = $_POST['from'];
  $fromdate = $from;
  $fromArr = explode("/",$from);


  
   $to = $_POST['to'];
   $todate = $to;
   $toArr = explode("/",$to);

    // echo $from;
    // echo "<br>";
    // echo $to;

   $query = "SELECT*FROM notestable WHERE user_id = '$uid' AND created_at >= '$from' && created_at < '$to' LIMIT {$offset },{$limit}";
    $data = mysqli_query($connection, $query);
    $result = mysqli_num_rows($data);
}

?>


    <div class="card shadow mb-4">

        <h2 class="text-center">Notes list</h2>
        <div class="card-body">
            <form class="form-inline my-2 my-lg-0" method="POST">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" >
                        <tr>
                            <td>
                                <label class="form-control" for="from">From</label>
                            </td>
                            <td>
                                <input type="date" class="form-control" name="from" required value="<?php echo $fromdate ?>">
                            </td>
                            <td>
                                <label class="form-control" for="to">to</label>
                            </td>
                            <td>
                                <input type="date" class="form-control" name="to" required value="<?php echo $todate ?>">
                            </td>
                            <td>
                                <input type="submit" name="submit" value="Filter" class="btn btn-warning my-2 my-sm-0">
                            </td>
                        </tr>
                        <tr>

                            <td>
                                <input class="form-control warning mr-sm-2" type="search" placeholder="Search" name="keyword" aria-label="Search">
                            </td>
                            <td>
                                <button class="btn btn-success my-2 my-sm-0" type="submit" name="search" value="search">Search</button>
                            </td>
                            <td colspan="3">
                                <div class="d-grid gap-2 d-md-flex " style="text-align:right">
                                    <a class="btn btn-primary p-2" href="note.php?source=add_notes" role="button">Add New</a>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
</div>


        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">

                        <thead>
                            <tr>
                                <th style="background-color:#36b9cc; color:white">Id</th>
                                <th style="background-color:#36b9cc; color:white">Title</th>
                                <th style="background-color:#36b9cc; color:white">Notes</th>
                                <th style="background-color:#36b9cc; color:white">Created At</th>
                                <th style="background-color:#36b9cc; color:white">Updated At</th>
                                <th colspan='2' style="background-color:#36b9cc; color:white">Action</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th style="background-color:#36b9cc; color:white">Id</th>
                                <th style="background-color:#36b9cc; color:white">Title</th>
                                <th style="background-color:#36b9cc; color:white">Notes</th>
                                <th style="background-color:#36b9cc; color:white">Created At</th>
                                <th style="background-color:#36b9cc; color:white">Updated At</th>
                                <th colspan='2' style="background-color:#36b9cc; color:white">Action</th>

                            </tr>
                        </tfoot>
                        <tbody>
                            <?php

                                    if($result > 0){
                                    // echo "display";
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

                        </tbody>

                    </table>
                </div>
        </div>

<?php
    $sql1 = "SELECT*FROM notestable WHERE user_id = '$uid'";

    $result1 = mysqli_query($connection,$sql1) or die("Query Failed.");

    if(mysqli_num_rows($result1) > 0){

        $total_records = mysqli_num_rows($result1);

        //$limit = 3;

        $total_page = ceil($total_records / $limit);
 
        echo '<ul class="pagination">';
        if($page > 1){
         echo '<li class="page-item"><a class="page-link" href="note.php?page='.($page-1).'">Prev</a></li>';
         }

        for($i = 1; $i <= $total_page; $i++){
          echo '<li class="page-item" ><a class="page-link" href="note.php?page='.$i.'">'.$i.'</a></li>';
         }

        if($total_page > $page){
          echo '<li class="page-item"><a class="page-link" href="note.php?page='.($page+1).'" >Next</a></li>';
        }
        echo '</ul">';
    }

    ?>

</div>

