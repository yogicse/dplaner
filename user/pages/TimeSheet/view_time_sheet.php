    <?php


        if(!isset($_SESSION['username'])){ 
            header('location:../login.php');
        }
            $uid = $_SESSION['id'];

                            
                // pagination calculation code
                $limit = 5;
                
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                }else{
                    $page = 1;
                }
                $offset = ($page - 1) * $limit;

    // add limit in select query for pagination
            $query = "SELECT time_sheet_detail.id,time_sheet_detail.project,time_sheet_detail.work_hours,time_sheet_detail.work_minutes, 
            time_sheet_detail.task_details,time_sheet_detail.time_sheet_date,users.username FROM time_sheet_detail INNER JOIN users 
            ON time_sheet_detail.user_id = users.id WHERE time_sheet_detail.user_id='$uid' ORDER BY time_sheet_detail.created_at DESC LIMIT {$offset },{$limit}";
            $data = mysqli_query($connection, $query);
            $result = mysqli_num_rows($data);

    ?>



    <div class="card shadow mb-4">
        <h2 class="text-center">Time Sheet list</h2>

            <div class="d-grid gap-2 d-md-flex float-right">
                <a class="btn btn-primary p-2" href="time_sheet.php?source=add_time_sheet" role="button">Add New</a>
            </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">

                    <thead>
                            <tr>
                                <th style="background-color:#36b9cc; color:white">Id</th>
                                <th style="background-color:#36b9cc; color:white">Project</th>
                                <th style="background-color:#36b9cc; color:white">Summary</th>
                                <th style="background-color:#36b9cc; color:white">Working Hours & Minutes</th>  
                                <th style="background-color:#36b9cc; color:white">Submitted Date</th>
                                <th colspan='2' style="background-color:#36b9cc; color:white">Action</th>

                            </tr>
                    </thead>
                    <tfoot>
                            <tr>
                                <th style="background-color:#36b9cc; color:white">Id</th>
                                <th style="background-color:#36b9cc; color:white">Project</th>
                                <th style="background-color:#36b9cc; color:white">Summary</th>
                                <th style="background-color:#36b9cc; color:white">Working Hours & Minutes</th>  
                                <th style="background-color:#36b9cc; color:white">Submitted Date</th>
                                <th colspan='2' style="background-color:#36b9cc; color:white">Action</th>
                            </tr>
                    </tfoot>
                <tbody>
                        <?php

                         if($result > 0){

                            while($row = mysqli_fetch_array($data)){
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['project']; ?></td>
                            <td><?php echo $row['task_details']; ?></td>
                            <td><?php echo $row['work_hours']." h :".$row['work_minutes']." m";?></td>
                            <td><?php echo $row['time_sheet_date']; ?></td>
                            <td><a href='/user/time_sheet.php?id=<?=$row['id']?>&source=delete_time_sheet'><?= delete_icon() ?></a></td>
                        </tr>
                        <?php } }else{
                        ?>
                        <tr>
                            <td>No Record Found</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>


<?php
        $sql1 = "SELECT*FROM time_sheet_detail WHERE user_id = '$uid'";

        $result1 = mysqli_query($connection,$sql1) or die("Query Failed.");

        if(mysqli_num_rows($result1) > 0){

                $total_records = mysqli_num_rows($result1);

            //$limit = 3;

            $total_page = ceil($total_records / $limit);
    
                echo '<ul class="pagination">';
                if($page > 1){
                    echo '<li class="page-item"><a class="page-link" href="time_sheet.php?page='.($page-1).'">Prev</a></li>';
                }

                    for($i = 1; $i <= $total_page; $i++){
                        echo '<li class="page-item" ><a class="page-link" href="time_sheet.php?page='.$i.'">'.$i.'</a></li>';
                    }

                if($total_page > $page){
                    echo '<li class="page-item"><a class="page-link" href="time_sheet.php?page='.($page+1).'" >Next</a></li>';
                }
                    echo '</ul">';
        }

    ?>
    </div>


