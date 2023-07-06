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

<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
           
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                            <?php 
                            echo isset($_GET['message']) ? $_GET['message'] : "";
                        ?>
                            <h3><i class="fa fa-lock fa-4x"></i></h3>
                                <h1 class="h4 text-gray-900 mb-4">Log In</h1>
                            </div>
                            <form class="user" action="login.php" method="post">
                                <div class="form-group">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user color-blue"></i></span>
                                    <input type="text" class="form-control form-control-user"
                                        id="user_name" name="username"  placeholder="User Name" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>
                                    <input type="password" class="form-control form-control-user"
                                        id="password" name="password" placeholder="Password" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="customCheck">
                                        <label class="custom-control-label" for="customCheck">Remember
                                            Me</label>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary btn-user btn-block" value="Login" name="submit">
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="#">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="create.php">Create an Account!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <hr>

    <?php include "includes/footer.php"; ?>

</div> <!-- /.container -->