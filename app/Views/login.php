<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Login</title>

    <link href="<?= base_url('css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('font-awesome/css/font-awesome.css') ?>" rel="stylesheet">

    <link href="<?= base_url('css/animate.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <p>Login in.</p>
            <?php if (isset($validation)): ?>
                <div class="col-12">
                  <div class="alert alert-danger" role="alert">
                    <?= $validation->listErrors() ?>
                  </div>
                </div>
            <?php endif; ?>
            <?php if (session()->get('success')): ?>
              <div class="alert alert-success" role="alert">
                <?= session()->get('success') ?>
              </div>
            <?php endif; ?>
            <form class="" action="<?= site_url('login') ?>" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="email" id="email" placeholder="Username" value="<?= set_value('email') ?>">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" id="password" value="" placeholder="password">
                </div>

                

                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                <a href="<?= site_url('forgot_password') ?>"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="<?= site_url('/register') ?>">Create an account</a>
            </form>
            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?= base_url('js/jquery-3.1.1.min.js') ?>"></script>
    <script src="<?= base_url('js/popper.min.js') ?>"></script>
    <script src="<?= base_url('js/bootstrap.js') ?>"></script>

</body>

</html>
