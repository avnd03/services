<?= $this->include('partials/main') ?>
<head>
    <?php echo view('partials/title-meta', array('title' => 'Login')); ?>
    <?= $this->include('partials/head-css') ?>
    <?= $this->include('partials/head-js') ?>
    <link href="<?=base_url()?>/assets/css/validetta.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>/assets/css/notifit.min.css" rel="stylesheet" type="text/css" />
</head>

<body class="loginbg">
  <div class="mt-5" id="layoutAuthentication2">
      <div id="layoutAuthentication_content2">
          <main>
              <div class="container-xl px-4">
                  <div class="row justify-content-end align-items-end">
                      <div class="col-lg-5">
                          <!-- Basic login form-->
                          <div class="card shadow-lg border-0 rounded-lg mt-5">
                              <div class="card-header justify-content-center"><h3 class="fw-light my-4">Login</h3></div>
                              <div class="card-body">
                                  <!-- Login form-->
                                  <form id="loginForm" method="post">
                                      <!-- Form Group (email address)-->
                                      <div class="mb-3">
                                          <label class="small mb-1" for="inputUserName">Username</label>
                                          <input class="form-control" id="inputUserName" name="username" type="text" placeholder="Enter your username" data-validetta="required"/>
                                      </div>
                                      <!-- Form Group (password)-->
                                      <div class="mb-3">
                                          <label class="small mb-1" for="inputPassword">Password</label>
                                          <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Enter password" data-validetta="required"/>
                                      </div>
                                      <!-- Form Group (remember password checkbox)-->
                                      <div class="mb-3">
                                          <div class="form-check">
                                              <input class="form-check-input" id="rememberPasswordCheck" type="checkbox" value="" />
                                              <label class="form-check-label" for="rememberPasswordCheck">Remember password</label>
                                          </div>
                                      </div>
                                      <!-- Form Group (login box)-->
                                      <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                          <a class="small" href="#">Forgot Password?</a>
                                          <button id="loginFormBtn" type="submit" class="btn btn-primary" >Login</button>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </main>
      </div>
  </div>
  <?= $this->include('partials/footer-scripts') ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="<?=base_url()?>/assets/js/validetta.min.js"></script>
  <script src="<?=base_url()?>/assets/js/notifIt.js"></script>
  <script src="<?=base_url()?>/assets/js/login.js"></script>
</body>

</html>
