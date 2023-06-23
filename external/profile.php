<?php include 'includes/header.php'; ?>
<?php include '../settings.php'; ?>
 
<div id="wrapper">
        <!-- Navigation -->
        <?php include "includes/navigation.php" ?>

<div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">

  <h1 class="page-header"><?php getTitle(); ?></h1>

<?php
    $user_username = $_SESSION['username'];
    $query = "SELECT * FROM users WHERE username='{$user_username}'";
    $view_user_query = pg_query($connection, $query);
    while($row = pg_fetch_assoc($view_user_query)) {
        $user_uid         = $row['uid'];
        $user_firstname   = $row['firstname'];
        $user_lastname    = $row['lastname'];
        $user_email       = $row['email'];
        $user_address     = $row['address'];
        $user_dob         = $row['dob'];
        $user_date        = $row['createddate'];
        $user_time        = $row['createdtime'];
        $user_employment  = $row['employment'];
        $user_role        = $row['role'];
        $user_sor         = $row['status_of_residence'];
        $user_la          = $row['living_arrangements'];
        $user_dependants  = $row['dependants'];
        $user_financial   = $row['financial'];
        $user_sa          = $row['substance_abuse'];
        $user_debts       = $row['debts'];
        $user_priors      = $row['priors'];
        $conv_dob         = date("d/m/Y", strtotime($user_dob));
        $editc_date       = date("d/m/Y", strtotime($user_date));
        $editc_time       = date("g:i a", strtotime($user_time));
    }                      

if(isset($_POST['update_user'])) {
            $query = "SELECT * FROM users WHERE username='{$user_username}';";
            $get_user_query = pg_query($connection, $query);
            while($row = pg_fetch_assoc($get_user_query)) {
            $user_uid         = $row['uid'];
            $user_username    = $row['username'];
            }
    
            if($_POST['firstname'] == $res['firstname']){
                $user_firstname = $res['firstname'];
            }
            else{
                $user_firstname = $_POST['firstname'];
                
            }

            if($_POST['firstname'] == $res['firstname']){
                $user_firstname = $res['firstname'];
            }
            else{
                $user_firstname = $_POST['firstname'];
                
            }
            if($_POST['firstname'] == $res['firstname']){
                $user_firstname = $res['firstname'];
            }
            else{
                $user_firstname = $_POST['firstname'];
                
            }
            if($_POST['firstname'] == $res['firstname']){
                $user_firstname = $res['firstname'];
            }
            else{
                $user_firstname = $_POST['firstname'];
                
            }
            if($_POST['firstname'] == $res['firstname']){
                $user_firstname = $res['firstname'];
            }
            else{
                $user_firstname = $_POST['firstname'];
                
            }
            if($_POST['firstname'] == $res['firstname']){
                $user_firstname = $res['firstname'];
            }
            else{
                $user_firstname = $_POST['firstname'];
                
            }
            if($_POST['firstname'] == $res['firstname']){
                $user_firstname = $res['firstname'];
            }
            else{
                $user_firstname = $_POST['firstname'];
                
            }

            
            $convert_dob = date("Y-m-d", strtotime($user_dob));
            $current_date = date("Y-m-d");
            $current_time = strftime("%X");

            $query = "UPDATE users SET username = '$user_username', firstname = '$user_firstname', lastname = '$user_lastname', email = '$user_email', address = '$user_address', dob = '$user_dob', employment = '$user_employment', status_of_residence = '$user_sor', living_arrangements = '$user_la', dependants = '$user_dependants', financial = '$user_financial', substance_abuse = '$user_sa', debts = '$user_debts', priors = '$user_priors', role = '$user_role' WHERE uid='{$user_uid}'; ";
            
            $edit_user_query = pg_query($connection, $query);
            if ($edit_user_query) {
                header("Location: users.php");    

            }
    
            if (!$edit_user_query) {
            echo "Update failed. <br>";
            echo "Query: " . $query . "<br>";
            echo "User query: " . $edit_user_query . "<br>";
            echo "Username: " . $user_username . "<br>";
            echo "Database error: " . $pg_last_error($connection) . "<br>";
            } 
   }
?>
   

<form action="" method="post" enctype="multipart/form-data">    
     
      <div class="form-group">
         <label for=uid>User ID</label>
         <p><?php echo $_SESSION['uid']; ?> </p>
      </div>
           
      <div class="form-group">
          <label for="uname">Username</label>
      <p><?php echo $_SESSION['username']; ?> </p>
      </div>
      
      <div class="form-group">
         <label for="name">Firstname</label>
          <input type="text" class="form-control" name="firstname" value="<?php echo $user_firstname; ?>">
      </div>
     
      <div class="form-group">
         <label for="surname">Lastname</label>
          <input type="text" class="form-control" name="lastname" value="<?php echo $user_lastname; ?>">
      </div>     

       <div class="form-group">
         <label for="mail">Email</label>
          <input type="email" class="form-control" name="email" value="<?php echo $user_email; ?>">
      </div>

      <div class="form-group">
         <label for="add">Street Address</label>
          <input type="text" class="form-control" name="address" value="<?php echo $user_address; ?>">
      </div> 
      
      <div class="form-group">
         <label for="db">Date of Birth</label>
          <input type="date" class="form-control" name="dob" value="<?php echo $user_dob; ?>">
      </div>
      
      <div class="form-group">
            <label for="empl">Employment Status</label> 
            <select name="employment" id="employment">
                <option value="<?php echo $user_employment; ?>" selected disabled hidden><?php echo $user_employment; ?></option>
                <option value="Full Time">Full Time</option>
                <option value="Part Time">Part Time</option>
                <option value="Casual">Casual</option>
                <option value="Fixed-term contract">Fixed-term contract</option>
                <option value="Self Employed">Self Employed</option>
                <option value="Apprentice or Trainee">Apprentice or Trainee</option>
                <option value="Unemployed">Unemployed</option>                
            </select>
      </div>
      
      <div class="form-group">
            <label for="sor">State of Residency</label> 
            <select name="status_of_residence" id="status_of_residence" value="<?php echo $user_sor; ?>">
                <option value="<?php echo $user_sor; ?>" selected disabled hidden><?php echo $user_sor; ?></option>
                <option value="Australian resident">Australian resident</option>
                <option value="Living in Australia">Living in Australia</option>
                <option value="Permanent residence visa holder">Permanent residence visa holder</option>
                <option value="Special Category visa (SCV) holder">Special Category visa (SCV) holder</option>   
                <option value="Family Member">Family member</option>
                <option value="Temporary protection type visas">Temporary protection type visas</option>
                <option value="Partner provisional visas">Partner provisional visas</option> 
            </select>
            
      </div>

      <div class="form-group">
         <label for="la">Living Arrangement</label>
            <select name="living_arrangements" id="living_arrangements">
                <option value="<?php echo $user_la; ?>" selected disabled hidden><?php echo $user_la; ?></option>
                <option value="Living as a single parent">Living as a single parent</option>
                <option value="Living with a partner">Living with a partner</option>
                <option value="Living with parents">Living with parents</option>
                <option value="Living with other relatives">Living with other relatives</option>
                <option value="Living in a group household">Living in a group household</option>
                <option value="Living in a non-private dwelling">Living in a non-private dwelling</option>
            </select>
      </div>
 
      <div class="form-group">
          <label for="dep">List any dependants</label>
          <input type="text" class="form-control" name="dependants" value="<?php echo $user_dependants; ?>">
      </div>
            

      <div class="form-group">
          <label for="fin">Provide your financial details</label>
          <input type="text" class="form-control" name="financial" value="<?php echo $user_financial; ?>">
      </div>

      <div class="form-group">
          <label for="sa">List any substances currently used</label>
          <input type="text" class="form-control" name="substance_abuse" value="<?php echo $user_sa; ?>">
      </div>

      <div class="form-group">
          <label for="debt">List any debts</label>
          <input type="text" class="form-control" name="debts" value="<?php echo $user_debts; ?>">
      </div>

      <div class="form-group">
         <label for="pri">List any prior offences</label>
         <input type="text" class="form-control" name="priors" value="<?php echo $user_priors; ?>">
      </div>
                        
      <div class="form-group">
            <label for="ro">Select Role</label> 
            <select name="role" id="" >
                <option value="none" selected disabled hidden><?php echo $user_role; ?></option>
                <option value="Administrator">Administrator</option>
                <option value="Client">Client</option>
                <option value="Employee">Employee</option>
            </select>
      </div>
      
      <div class="form-group">
         <label for=cd>User creation date: </label>
         <p><?php echo $editc_date; ?> </p>
      </div>
           
      <div class="form-group">
         <label for=ct>User creation time: </label>
         <p><?php echo $editc_time; ?> </p>
      </div>
      
      <div class="form-group">
          <input class="btn btn-primary" onclick="javascript:window.location='profile.php';" value="Cancel"> &nbsp; <input class="btn btn-success" type="submit" name="update_user" value="Update Profile">
      </div>
</form>

            </div>
        <!-- /.row -->
        </div>
    <!-- /.container-fluid -->
    </div>
        <!-- /#page-wrapper -->
</div>

</div>

<br>
<br>
<?php include 'includes/footer.php'; ?>