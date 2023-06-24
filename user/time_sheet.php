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


                    <?php
                        switch ($source) {

                            case 'add_time_sheet':
                                include "pages/TimeSheet/add_time_sheet.php";
                            break;

                            case 'delete_notes':
                                include "pages/TimeSheet/delete_time_sheet.php";
                            break;

                            default:
                                include "pages/TimeSheet/view_time_sheet.php";
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