<?php 
include_once 'includes/db.php';
 include "includes/header.php";




if(isset($_POST['new_user'])) {
createUser();
}

// $activePage = "create";
?>


<div id="wrapper">

    <!-- <?php include 'includes/navigation.php'; ?>    -->

<div id="page-wrapper">
    <div class="container">
		<header class="row">
			
			<h1 class="text-center">New Account Registration Form</h1>

		</header>
<div class="container">
    <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
       <?php if(!empty($message)) { 
        echo "<h6 class='text-center'>" . $message . "</h6>"; } ?>    
      <div class="form-group">
         <label for="uname">Username</label>
          <input type="text" class="form-control" m name="username" required autofocus>
      </div>
      <div class="form-group">
         <label for="pwd">Password</label>
          <input type="password" class="form-control" id="password" name="password" required autocomplete="new-password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" title="Must contain 8 or more characters, at least one number, one uppercase, one lowercase letter, and at least 1 special character">
      <!-- <div id="message">
          <h3>Password must contain the following:</h3>
          <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
          <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
          <p id="number" class="invalid">A <b>number</b></p>
          <p id="character" class="invalid">A <b>special character</b></p>
          <p id="length" class="invalid">Minimum <b>8 characters</b></p>
      </div> -->
      </div>
      <div class="form-group">
         <label for="name">Firstname</label>
          <input type="text" class="form-control" name="firstname" required autofocus autocomplete="given-name">
      </div>
      <div class="form-group">
         <label for="surname">Lastname</label>
          <input type="text" class="form-control" name="lastname" required autofocus autocomplete="family-name">
      </div>     
     <div class="form-group">
         <label for="mail">Email</label>
          <input type="email" class="form-control" name="email" onblur="javascript:checkemailAvailability()" required autofocus>
      </div>
    
     <div class="form-group">
         <label for="phone">Phone Number</label>
         <input type="tel" class="form-control" maxlength="15" name="phone">
     </div>    
     
     

      <div class="form-group">
          <input class="btn btn-success" type="submit" name="new_user" value="Done">
          <input class="btn btn-danger" onclick="javascript:window.location='login.php';" value="Cancel">
      </div>
</form>
</div>
</div>
</div>
</div>