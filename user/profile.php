<?php
session_start();
if(!isset($_SESSION['username'])){ 
 header('location:../login.php');
}
include 'layouts/header.php'; 
?>


<!-- profile update code -->
<?php
if(isset($_POST['update-btn'])){
   
    $id = mysqli_real_escape_string($connection , $_POST['id']);
    $username = mysqli_real_escape_string($connection , $_POST['username']);
    $firstname = mysqli_real_escape_string($connection , $_POST['firstname']);
    $lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $phone = mysqli_real_escape_string($connection , $_POST['phone']);
  
      $update = "UPDATE users SET
       id         = '$id', 
       username   = '$username', 
       firstname  = '$firstname', 
       lastname   = '$lastname', 
       email      = '$email', 
       phone      = '$phone' 
       
       WHERE id ='$id'";
  
      $data = mysqli_query($connection, $update);
  
   
     $_SESSION['firstname'] = $firstname;
     $_SESSION['lastname'] = $lastname;
     $_SESSION['email'] =     $email;
     $_SESSION['phone'] =     $phone;

      if($data){
         ?>
           <script>
            
              alert("Your Profile Updated Successfuly");
           
              window.open("http://projectmanegment.local/user/dashboard.php","_self");
           </script>
         <?php
      }else{
          ?>
          <script>
             alert("please try again");
             
          </script>
        <?php
      }
  }

?>




<!-- forntentcode -->
<div id="wrapper">
    <!-- Navigation -->
    <?php include "layouts/navigation.php" ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">

                 
<form action="" class="form-horizontal" method="POST" >


<h1>Profile</h1>
<hr>
     <div class="form-group">
        <label for="uid">Id</label>
         <input type="text" class="form-control" name="id" value ="<?php echo $_SESSION['id']; ?>">
     </div>

     <div class="form-group">
        <label for="uname">Username</label>
         <input type="text" class="form-control" name="username" value ="<?php echo $_SESSION['username']; ?>">
     </div>
     
     <div class="form-group">
        <label for="name">Firstname</label>
         <input type="text" class="form-control" name="firstname" value="<?php echo $_SESSION['firstname']; ?>" >
     </div>
     <div class="form-group">
        <label for="surname">Lastname</label>
         <input type="text" class="form-control" name="lastname" value="<?php echo $_SESSION['lastname']; ?>">
     </div>     
    <div class="form-group">
        <label for="mail">Email</label>
         <input type="email" class="form-control" name="email" value="<?php echo $_SESSION['email']; ?>">
     </div>
   
    <div class="form-group">
        <label for="phone">Phone Number</label>
        <input type="tel" class="form-control" maxlength="15" name="phone" value="<?php echo $_SESSION['phone']; ?>">
    </div>    
    
    

     <div class="form-group">
         <input class="btn btn-success" type="submit" name="update-btn" value="Update">
         <!-- <input class="btn btn-danger"  value="Cancel"> -->
         <a class="btn btn-danger" href="dashboard.php">Cancel</a>
     </div>
</form>

                    

                    <?php
                    // include "pages/dashboard/dashboard.php";
                     // include "pages/dashboard/dashboard.php";
                    ?>
                </div>
            </div>
        </div>
    </div>

</div>

<br>
<br>
<?php include 'layouts/footer.php'; ?>


