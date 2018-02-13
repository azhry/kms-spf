<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="<?= base_url('') ?>" class="site_title"><img width="20%" src="<?= base_url('assets') ?>/logo.jpg" class="img img-thumbnail img-responsive"> <span>Pemetaan Jalan</span></a>
                </div>
                <div class="clearfix"></div>
                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="<?= base_url('assets/') ?>/user.png" alt="User" class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2><?= $nip ?></h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->
                <br />
                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>Menu</h3>
                        <ul class="nav side-menu">
                            <?php if ($role == 'admin'): ?>
                            <li><a href="<?= base_url('admin') ?>"><i class="fa fa-home"></i> Dashboard</a>
                                <ul class="nav child_menu">
                                </ul>
                            </li>
                            <li><a href="<?= base_url('admin/jalan') ?>"><i class="fa fa-user fa-fw"></i> Data Jalan</a>
                                <ul class="nav child_menu">
                                </ul>
                            </li>
                            <li><a href="<?= base_url('admin/user') ?>"><i class="fa fa-bar-chart-o"></i> Data User</a>
                                <ul class="nav child_menu">
                                </ul>
                            </li>
                            <?php elseif ($role == 'kepala dinas'): ?>
                            <li><a href="<?= base_url('kepala-dinas') ?>"><i class="fa fa-home"></i> Dashboard</a>
                                <ul class="nav child_menu">
                                </ul>
                            </li>
                            <li><a href="<?= base_url('kepala-dinas/jalan') ?>"><i class="fa fa-user fa-fw"></i> Data Jalan</a>
                                <ul class="nav child_menu">
                                </ul>
                            </li>
                            <?php endif; ?>
                        </ul>
</div>
</div>
<!-- /sidebar menu -->
</div>
</div>