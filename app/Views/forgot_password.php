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
  <div class="container">
  	<div class="row">

        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
            <div class="ibox-content">
                <h2 class="font-bold">Forgot password</h2>
                <p>
                    Enter your email address and your password will be reset and emailed to you.
                </p>

                <div class="row">

                    <div class="col-lg-12">
                        <form class="m-t" role="form" action="index.html">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email address" required="">
                            </div>

                            <button type="submit" class="btn btn-primary block full-width m-b">Send new password</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


 </div>

<!-- Mainly scripts -->
    <script src="<?= base_url('js/jquery-3.1.1.min.js') ?>"></script>
    <script src="<?= base_url('js/popper.min.js') ?>"></script>
    <script src="<?= base_url('js/bootstrap.js') ?>"></script>

</body>

</html>  

