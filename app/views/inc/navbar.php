<header class="p-3 text-bg-dark">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="<?php echo URLROOT ?>" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
        <?PHP SITENAME ?>
      </a>
      <h1><?php echo SITENAME; ?></h1>
      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="<?php echo URLROOT ?>" class="nav-link px-2 text-secondary">Home</a></li>
        <li><a href="<?php echo URLROOT ?>/pages/about" class="nav-link px-2 text-white">about</a></li>

      </ul>



      <div class="text-end">
        <a href="<?php echo URLROOT; ?>/users/login">
          <button type="button" class="btn btn-outline-light me-2"> Login</button></a>
        <a href="<?php echo URLROOT; ?>/users/register"><button type="button" class="btn btn-warning">Sign-up</button></a>

      </div>
    </div>
  </div>
</header>