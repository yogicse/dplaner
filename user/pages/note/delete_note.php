<?php
$id = $_GET['id'];

$queryd = "DELETE FROM notestable WHERE id = '$id'";

$d = mysqli_query($connection, $queryd);

if($d){
    ?>
    <script>
        alert('data has been deletd successfully');
        window.open("<?php echo SITEURL ?>/user/note.php?source=notes", "_self");
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