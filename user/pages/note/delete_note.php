<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Delete code</h3>
</body>
</html> -->

<?php
$id = $_GET['id'];

$queryd = "DELETE FROM notestable WHERE id = '$id'";

$d = mysqli_query($connection, $queryd);

if($d){
    ?>
<script>
alert('data has been deletd successfully');
window.open("http://projectmanegment.local/user/note.php?source=notes", "_self");
</script>
<?php
}
else{
    ?>
<script>
alert('Please try Again');
</script>
<?php
}

?>