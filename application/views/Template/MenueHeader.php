<?php $this->load->view('Template/Header') ;?>
<header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>C</b>S</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>AD</span>
    </a>
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="container">
            <div class="navbar-header">
                <!--  <a href="../../index2.html" class="navbar-brand"><b>Admin</b>CS</a> -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
            </div>


            <!-- Header Navbar: style can be found in header.less -->
            <!--  <nav class="navbar navbar-static-top" role="navigation"> -->
            <!-- Sidebar toggle button-->


            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                <section class="navigation-items">
                    <ul class="nav navbar-nav">
                        <li><a>ERP</a></li>
                    </ul>
                </section>

            </div>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class=" user user-menu">

                        <a href="<?php echo site_url('Dashboard/updateProfile')?>">
                            <img src="<?php echo base_url();?>assets/img/avatar5.png" class="user-image" alt="User Image">

                            <span class="hidden-xs">Profile</span>
                        </a>
                    </li>
                    <li class=" user user-menu">

                        <a href="<?php echo site_url('Login/Logout')?>">
                            <span class="hidden-xs">Log out</span>
                        </a>
                    </li>

                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"></a>
                    </li>
                    <li>
                        <a href="#" data-toggle="control-sidebar"></a>
                    </li>
                </ul>
            </div>

    </nav>
</header>