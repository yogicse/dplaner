<?php
$page_url = "/user/note.php?r=1&source=documents";
$redirect_url = "/user/note.php?r=1&source=documents";
$uid = get_session_user_id();
// $uid = $_GET['id'];


 $query = "SELECT*FROM notestable LEFT JOIN share_note
ON notestable.id = share_note.note_id
WHERE share_note.user_id = '$uid'";

$data = mysqli_query($connection, $query);
$result = mysqli_num_rows($data);

$row = mysqli_fetch_array($data);

?>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th class="text-center">Id</th>
            <th class="text-center">Title</th>
             <th class="text-center">Notes</th>
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
                <td class="text-center"><a href='/user/note.php?id=<?=$row['id']?>&source=view_shared_notes'><?=view_icon()?></a></td>
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


