<style>
.side-nav {
    background-color: #000;
}



    .submenu {
        background-color: #14213d;
    }

    .color_notification { 
        color: #fca311;
    }

    .selected_menu {
        font-weight:bold;
        background-color:#222;
    }

    .nav li {
        box-shadow: 0px 0px 0px 0px; 
    }      
</style>
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/user/dashboard.php">Notes Project</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
            <p class="navbar-text">
                    <?php 
                    $current_date = date("d-m-Y");
                    $current_time = time();
                    $hour = date('H', time());
                    $goodMorning = "";
                    if( $hour > 6 && $hour <= 11) {
                        $goodMorning = "Good Morning";
                    }
                    else if($hour > 11 && $hour <= 16) {
                        $goodMorning = "Good Afternoon";
                    }
                    else {
                        $goodMorning = "Good Evening";
                    }

                    // echo "It's currently: " . $current_time . "&nbsp;&nbsp; Date: " . $current_date . "&nbsp;&nbsp;" . $_SESSION['firstname'] . "&nbsp;" .  $_SESSION['lastname'] . " is logged in.";
                    echo "It's currently: " . $current_time . "&nbsp;&nbsp; Date: " . $current_date . "&nbsp;&nbsp;" . $goodMorning . ' '.$_SESSION['firstname'] . "&nbsp;" .  $_SESSION['lastname'];
                    ?> 
            </p>
                <li>
                <a href="/user/dashboard.php"><i class="fa fa-home"></i> Home</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- <i class="fa fa-envelope color_notification"></i> <b class="caret"></b> -->
                        <i class="fa fa-bell color_notification"></i>
                        <b class="caret"></b></a>

                    </a>

                    <ul class="dropdown-menu message-dropdown">

                <?php 

    ?>
       
   
                    </ul>
                </li>
               
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['firstname'] . "&nbsp;" . $_SESSION['lastname']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                       
                        <li class="divider"></li>
                        <li>
                            <a href="/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                   <br />
                    <li>
                        <a href="dashboard.php"> <img src="..\assets\back\images\dashboard.jpg" alt="" width="25" height="26">Dashboard</a>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#invoices"><img src="..\assets\back\images\correspondence.png" alt="" width="25" height="26"> Note <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="invoices" class="collapse submenu">
                            <li>
                                <a href="note.php?source=notes">Notes</a>
                            </li>
                            <li>
                                <a href="note.php?source=add_notes"> Add Notes</a>
                            </li>
                            <li>
                                <a href="note.php?source=shared_notes"> Shared Notes</a>
                            </li>
                            
                        </ul>
                    </li>
                 <!--end for  notes -->

                 <!-- for task module -->
                 <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#task"><img src="..\assets\back\images\task.png" alt="" width="25" height="26"> Task <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="task" class="collapse submenu">
                            <li>
                                <a href="task.php?source=tasks">task</a>
                            </li>
                            <li>
                                <a href="task.php?source=add_tasks"> Add Task</a>
                            </li>  
                        </ul>
                    </li>
<!-- end of task module -->

                   
                    <li>
                        <a href="profile.php"><img src="..\assets\back\images\profile.png" alt="" width="25" height="26"> My Profile</a>
                    </li>    

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        
