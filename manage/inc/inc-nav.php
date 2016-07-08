<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><? echo $title; ?> Admin</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
            
               
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                      Welcome Back, <? echo $_SESSION[users_name]; ?>  <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <!--<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        -->
                        <li><a href="login.php?logout=true"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                     <li>
                            <a href="../index.php"><i class="fa fa-home fa-fw"></i> Home</a>
                           
                        </li>
                        <? if($_SESSION[account_type_id] == 2){ ?>
	                <li>
                            <a href="sliders.php"><i class="fa fa-columns fa-fw"></i> Banners</a>
                        </li>
                        <? } ?>
                       
                         <li>
                            <a href="portfolios.php"><i class="fa fa-image fa-fw"></i> Grant Portfolio</a>
                        </li>
                      
                          <li>
                            <a href="press.php"><i class="fa fa-cube fa-fw"></i> News</a>
                        </li>
                         <li>
                            <a href="newsletters.php"><i class="fa fa-file-text fa-fw"></i> Newsletters</a>
                        </li>
                         <li>
                            <a href="applications.php"><i class="fa fa-folder fa-fw"></i> Application Forms</a>
                        </li>
                         
                        
                        
                      <!--
                        <li>
                            <a href="slider.php"><i class="fa fa-wrench fa-fw"></i> Slider</a>
                           
                        </li>
                        <li>
                            <a href="gallery.php"><i class="fa fa-table fa-fw"></i> Gallery</a>
                        </li>
                      
                        
                         <li>
                            <a href="about.php?edit=1"><i class="fa fa-files-o fa-fw"></i> About</a>
                        </li>
                         <li>
                            <a href="about.php?edit=2"><i class="fa fa-files-o fa-fw"></i> Our Mission</a>
                        </li>
                        
                       -->
                        <? if($_SESSION[account_type_id] == 2){ ?>
                         <li>
                            <a href="users.php"><i class="fa fa-user fa-fw"></i> Users</a>
                        </li>
                        <? } ?>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
<? if($topnav == true){ ?>
<style>
#page-wrapper{margin:0px!important;}
.sidebar{width:auto;position:relative;}
.nav>li{
	display:inline-block;	
}
</style>
<? } ?>