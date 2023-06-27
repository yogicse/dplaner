<?php 
    include_once '../includes/common.php';

    $source = get_source();  
    $page_title = getTitle($source);

    if($page_title == "Note") {
        $page_title = "Note Orders";
    }
    
    if($source  == "blank") {
        include "pages/court/cases/blank.php";
        exit();
    }
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
                        <?php if ($page_title === 'Note Order') :?>       
                        <large>Your Note</large>
                        <small>List of your current and upcoming Notes</small>
                        <?php else:?>
                            <?=$page_title?>
                        <?php endif;?>
                    </h1>


                    <?php
                        switch ($source) {

                            case 'add_notes';
                                include "pages/note/add_note.php";
                            break;
                            
                            case 'edit_notes';
                                include "pages/note/edit_note.php";
                            break;

                            case 'view_notes';
                                include "pages/note/view_note.php";
                            break;

                            case 'delete_notes';
                                include "pages/note/delete_note.php";
                            break;

                            case 'share_notes';
                                include "pages/note/share_note.php";
                            break;
 
                            case 'shared_notes';
                                include "pages/note/shared_note.php";
                            break;
                           
                            case 'send_notes';
                            include "pages/note/send_note.php";
                            break;
                            
                            case 'view_shared_notes';
                            include "pages/note/view_shared_note.php";
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