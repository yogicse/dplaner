<?php include 'includes/db.php'; 

include "includes/header.php";

?>

<?php ob_start(); ?>
<?php
if (isset($_POST['submit'])) {
    //Session start, to generate dynamic kcaptcha codes and display flash messages
    if (!isset($_SESSION)) {
        session_start();
    }
    loginUser();
}
?>



    <div class="container">



    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                        <?php 
                            echo isset($_GET['message']) ? $_GET['message'] : "";
                        ?>

                            <h3><i class="fa fa-lock fa-4x"></i></h3>
                            <h2 class="text-center">Login</h2>
                            <p></p>
                            <div class="panel-body">

                  
                            <form action="login.php" method="post">

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user color-blue"></i></span>
                                            <input type="text" name="username" class="a form-control" placeholder="Username" required autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>
                                            <input type="password" name="password" class="a form-control"  placeholder="Password" required>
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <input type="submit" class="btn btn-lg btn-primary btn-block" value="Login" name="submit"><br><br>
                                          
                                        <p>Create new Account</p>
                                        
                                        <a class="btn btn-lg btn-primary btn-block" href="create.php" value="SignUp" name="submit">SignUp</a>
                                    </div>
                                   

                                </form>

                            </div><!-- Body-->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <hr>

    <?php include "includes/footer.php"; ?>

</div> <!-- /.container -->