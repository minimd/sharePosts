<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row">
    <div class="col-md6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>sign in</h2>
            <p>enter your credentials</p>
            <form action="<?php echo URLROOT; ?>/users/login" method="POST">
                
                <div class="form-group">
                    <label for="email">email: <sup>*</sup> </label>
                    <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''  ?>" value="<?php echo $data['email']; ?>" id="">
                    <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="password">password: <sup>*</sup> </label>
                    <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''  ?>" value="<?php echo $data['password']; ?>" id="">
                    <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                </div>
                
                <div class="row "
                style="padding-top: 10px;">
                    <div class="col">
                        <input type="submit" value="login" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                        <a href="<?php echo URLROOT;?>/users/register">no account ?</a>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>