<?php
    $note_id = $_GET['id'];
?>

<!-- form for serching user email -->
<form action="" method='post'>
    <input class="form-control-warning mr-sm-2" type="search" placeholder="Email" name="keyword"
        aria-label="Search">
    <button class="btn btn-primary my-2 my-sm-0" type="submit" name="search" value="search">Search</button>
</form>


       
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Email</th>
            <th colspan='2'>Action</th>
        </tr>
    </thead>    

<?php
    //searching of user by Email
    if(isset($_POST['search'])){
    $keyword = $_POST['keyword'];
    $query = "SELECT*FROM users WHERE `email` LIKE '%$keyword%' ";
    $data = mysqli_query($connection, $query);
    $result = mysqli_num_rows($data);

   

    ?> 
        <tbody>
            <?php
        if($result > 0){
        while($row = mysqli_fetch_array($data)){
          
            ?>
                <tr>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                    <a class="btn btn-success p-2" href='/user/note.php?id=<?=$row['id']?>&note_id=<?=$_GET['id']?>&source=send_notes'>Send</a>
                    <a class="btn btn-primary p-2" href='/user/note.php?id=<?=$row['id']?>&email=<?=$row['email']?>&note_id=<?=$_GET['id']?>&source=send_invites'>Invite</a>    
                </td>
                    
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
 <?php
}
 ?>

 