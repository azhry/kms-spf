<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Knowledge Management System - PT. Sumatera Prima Fibreboard">
  <meta name="author" content="Harsi Rahayu">
  <meta name="keyword" content="Knowledge, Management, Information, System, Fuzzy, String, Matching">
  <link rel="shortcut icon" href="<?= base_url('assets/NiceAdmin') ?>/img/logo-big.png">

  <title><?= $title ?></title>

  <!-- Bootstrap CSS -->
  <link href="<?= base_url('assets/NiceAdmin') ?>/css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="<?= base_url('assets/NiceAdmin') ?>/css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="<?= base_url('assets/NiceAdmin') ?>/css/elegant-icons-style.css" rel="stylesheet" />
  <link href="<?= base_url('assets/NiceAdmin') ?>/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="<?= base_url('assets/NiceAdmin') ?>/css/style.css" rel="stylesheet">
  <link href="<?= base_url('assets/NiceAdmin') ?>/css/style-responsive.css" rel="stylesheet" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body class="login-img3-body">

  <div class="container">

    <?= form_open('login','class="login-form"') ?>
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div>
          <?= $this->session->flashdata('msg') ?>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" class="form-control" name="username" placeholder="Username" autofocus>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-home"></i></span>
          <select name="role" class="form-control" required>
              <?php foreach($role as $row): ?>
                  <option value="<?= $row->id_role ?>"><?= $row->role ?></option>
              <?php endforeach; ?>
          </select>
        </div>
        
        <!-- <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
            </label> -->
        <input type="submit" name="login-submit" class="btn btn-primary btn-lg btn-block" value="Login">
        <!-- <button class="btn btn-info btn-lg btn-block" type="submit">Signup</button> -->
      </div>
    </form>
    <div class="text-right">
      <div class="credits">
          <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
          -->
          <a href="https://bootstrapmade.com/">Free Bootstrap Templates</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
  </div>


</body>

</html>
