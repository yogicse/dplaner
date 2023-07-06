            <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="http://vista.dvl.to/user/dashboard.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>

                <!-- Divider -->
            <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="http://vista.dvl.to/user/dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
            </li>

                <!-- Divider -->
            <hr class="sidebar-divider">

                <!-- Heading -->
            <div class="sidebar-heading">
                 Addons
            </div>

                <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Notes</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="note.php?source=notes">View Notes</a>
                        <a class="collapse-item" href="note.php?source=add_notes">Add Notes</a>
                        <div class="collapse-divider"></div>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage"
                    aria-expanded="true" aria-controls="collapsePage">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Time Sheet</span>
                </a>
                <div id="collapsePage" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Add Your Time Sheet:</h6>
                        <a class="collapse-item" href="time_sheet.php?source=add_time_sheet"> Add Sheet</a>
                        <a class="collapse-item" href="time_sheet.php?source=view_time_sheet"> View Sheet</a>
                        <a class="collapse-item" href="time_sheet.php?source=sheet_listing">Sheet Listing</a>
                        <a class="collapse-item" href="time_sheet.php?source=demo">Demo</a>
                        <div class="collapse-divider"></div>
                    </div>
                </div>
            </li>
                         <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
  
  
  
  <!-- Navigation -->
  <div id="content-wrapper" class="d-flex flex-column">
  <div id="content">
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->

    <!-- Top Menu Items -->
    <ul class="navbar-nav ml-auto">
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
            //echo "It's currently: " . $current_time . "&nbsp;&nbsp; Date: " . $current_date . "&nbsp;&nbsp;" . $goodMorning . ' '.$_SESSION['firstname'] . "&nbsp;" .  $_SESSION['lastname'];
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
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user"></i> 
                <?php echo $_SESSION['firstname'] . "&nbsp;" . $_SESSION['lastname']; ?> 
                <b class="caret"></b>
            </a>
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
       <!-- /.navbar-collapse -->
</nav>