<nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="<?= base_url() ?>template/assets/img/find_user.png" class="user-image img-responsive"/>
					</li>				
                    <li>
                        <a  href="<?= base_url('home') ?>"><i class="fa fa-globe"></i> Pemetaan</a>
                    </li>
                      <li>
                        <a  href="<?= base_url('permandian') ?>"><i class="fa fa-building"></i> Permandian</a>
                    </li>
                    
                    <li>
                        <a  href="<?= base_url('permandian/input') ?>"><i class="fa fa-plus"></i> Input Permandian</a>
                    </li>
                    <li>
                        <a  href="<?= base_url('user') ?>"><i class="fa fa-users"></i> User</a>
                    </li>
                    <li>
                        <a  href="<?= base_url('user/input') ?>"><i class="fa fa-plus"></i> Input User</a>
                    </li>
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2><?= $title; ?></h2>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />