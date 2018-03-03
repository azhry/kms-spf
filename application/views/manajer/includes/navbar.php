<!--header start-->
<header class="header dark-bg">
    <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
    </div>
    <!--logo start-->
    <a href="<?= base_url('manajer') ?>" class="logo">KMS <span class="lite">SPF</span></a>
    <!--logo end-->
    <div class="nav search-row" id="top_menu">
        <!--  search form start -->
        <ul class="nav top-menu">
            <li>
                <form class="navbar-form">
                    <input class="form-control" placeholder="Search" type="text">
                </form>
            </li>
        </ul>
        <!--  search form end -->
    </div>
    <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">
            <!-- user login dropdown start-->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="profile-ava">
                        <img alt="Foto" src="<?= base_url('assets/foto/manajer/'.$this->data['id_karyawan'].'.jpg') ?>" onerror="this.src='<?= base_url("assets/NiceAdmin") ?>/img/avatar1_small.jpg'" width="40" height="40">
                    </span>
                    <span class="username"><?= $karyawan->nama ?></span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout">
                    <div class="log-arrow-up"></div>
                    <li class="eborder-top">
                        <a href="<?= base_url('manajer/upload_foto') ?>"><i class="icon_profile"></i> Foto Profile</a>
                    </li>
                    <li>

                        <a href="<?= base_url('logout') ?>"><i class="icon_key_alt"></i> Log Out</a>
                    </li>
                </ul>
            </li>
            <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
    </div>
</header>
<!--header end-->