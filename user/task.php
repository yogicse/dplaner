<?php 
    include_once '../includes/common.php';

    $source = get_source();  
    $page_title = getTitle($source);

   
    include 'layouts/header.php';
?>

<div id="wrapper">

    <?php include "layouts/navigation.php" ?>

    <div id="page-wrapper" class="client-court-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                <?=message()?>

                <h1 class="page-header">
                        <?php if ($page_title === 'Task') :?>       
                        <large>Task</large>
                        <small>List of your current task</small>
                        <?php else:?>
                            <?=$page_title?>
                        <?php endif;?>
                    </h1>



                    <?php
                        switch ($source) {

                            case 'add_tasks';
                                include "pages/task/add_task.php";
                            break;
                            case 'view_tasks';
                            include "pages/task/view_task.php";
                            break;
                            case 'edit_tasks';
                            include "pages/task/edit_task.php";
                            break;
                            case 'delete_tasks';
                            include "pages/task/delete_task.php";
                            break;
                
                            default:
                                include "pages/task/list_task.php";
                            break;
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>


<?php include 'layouts/footer.php'; 