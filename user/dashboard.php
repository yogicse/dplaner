<?php
// include_once '../includes/common.php';
// is_client();

// $source = get_source();  
// $page_title = getTitle($source);
session_start();
if(!isset($_SESSION['username'])){
 header('location:../login.php');
}
include 'layouts/header.php';

?>

<div id="wrapper">
    <!-- Navigation -->
    <?php include "layouts/navigation.php" ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">

                 

                    

                    <?php
                    // include "pages/dashboard/dashboard.php";
                      include "pages/dashboard/dashboard.php";
                    ?>
                </div>
            </div>
        </div>
    </div>

</div>

<br>
<br>
<?php include 'layouts/footer.php'; ?>