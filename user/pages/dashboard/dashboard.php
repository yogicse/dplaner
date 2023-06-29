<?php
include_once '../includes/common.php';

$uid = get_session_user_id();
?>
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">
               <h2> Total Notes</h2>
                    <?php
                        $totalnotes = "SELECT* FROM notestable WHERE user_id='$uid'";
                        $totalquery = mysqli_query($connection,$totalnotes);

                        if($row = mysqli_num_rows($totalquery)){
                            echo '<h4 class="mb-0">'.$row.'</h4>';

                        }else{
                            echo '<h4 class="mb-0">No Any Notes</h4>';
                        }
                    ?>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card bg-info text-white mb-4">
            <div class="card-body">
               <h2> Total Task</h2>
                    <?php
                        $totaltask = "SELECT* FROM tasktable WHERE user_id='$uid'";
                        $totaltaskquery = mysqli_query($connection,$totaltask);

                        if($row = mysqli_num_rows($totaltaskquery)){
                            echo '<h4 class="mb-0">'.$row.'</h4>';

                        }else{
                            echo '<h4 class="mb-0">No Task</h4>';
                        }
                    ?>
            </div>
        </div>
    </div>
</div>