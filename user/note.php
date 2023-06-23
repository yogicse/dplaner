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

                            case 'add_notes';
                                include "pages/note/add_note.php";
                            break;
                            
                            case 'edit_notes';
                                include "pages/note/edit_note.php";
                            break;

                            case 'delete_notes';
                                include "pages/note/delete_note.php";
                            break;

                            default:
                                include "pages/note/list_note.php";
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