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
        <div class="container">
          <h3>Register</h3>
          <hr>
          <form class="" action="<?= site_url('register_user') ?>" method="post">
            <div class="row">
              <div class="col-12 col-sm-6">
                <div class="form-group">
                 <label for="firstname">First Name</label>
                 <input type="text" class="form-control" name="firstname" id="firstname" value="<?= set_value('firstname') ?>">
                </div>
              </div>
              <div class="col-12 col-sm-6">
                <div class="form-group">
                 <label for="lastname">Last Name</label>
                 <input type="text" class="form-control" name="lastname" id="lastname" value="<?= set_value('lastname') ?>">
                </div>
              </div>
              <div class="col-9">
                <div class="form-group">
                 <label for="email">Email address</label>
                 <input type="text" class="form-control" name="email" id="email" value="<?= set_value('email') ?>">
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                 <label for="user_type">User Type</label>
                 <select name="user_type" class="form-control">
                    <option value="Artist">Artist</option>
                    <option value="Member">Member</option>
                    <option value="Guest">Guest</option>
                 </select>
                </div>
              </div>
              <div class="col-12 col-sm-6">
                <div class="form-group">
                 <label for="password">Password</label>
                 <input type="password" class="form-control" name="password" id="password" value="">
               </div>
             </div>
             <div class="col-12 col-sm-6">
               <div class="form-group">
                <label for="password_confirm">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirm" id="password_confirm" value="">
              </div>
            </div>
            <?php if (isset($validation)): ?>
              <div class="col-12">
                <div class="alert alert-danger" role="alert">
                  <?= $validation->listErrors() ?>
                </div>
              </div>
            <?php endif; ?>
            </div>

            <div class="row">
              <div class="col-12 col-sm-4">
                <button type="submit" class="btn btn-primary">Register</button>
              </div>
              <div class="col-12 col-sm-8 text-right">
                <a href="<?= site_url('/login') ?>">Already have an account</a>
              </div>
            </div>
          </form>
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

