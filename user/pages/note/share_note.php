<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Shaire page</h2>
</body>
</html> -->
<?php
$note_id = $_GET['id'];
echo $note_id;
?>
<form action="" method='post'>
        <input class="form-control-warning mr-sm-2" type="search" placeholder="Email" name="keyword"
            aria-label="Search">
        <button class="btn btn-primary my-2 my-sm-0" type="submit" name="search" value="search">Search</button>
    </form>

       
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>    <!-- table code -->



    <?php
    //search for user by Email
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

 