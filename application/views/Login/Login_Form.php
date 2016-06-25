<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div id="loginbox" style="margin-top:150px;margin-bottom: 200px;"
     class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title">Se connecter</div>

        </div>

        <div style="padding-top:30px" class="panel-body">

            <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
            <div class="row omb_row-sm-offset-3">
                <div class="col-xs-12 col-sm-12">

                  <?php  echo form_open('Login/login');?>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" name="email" placeholder="username or  email address" required>
                        </div>
                        <span class="help-block"></span>

                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" class="form-control" name="password" placeholder="mot de passe" required>
                        </div>
                        <br>
                        <button class="btn btn-lg btn-danger btn-block" type="submit">connecter</button>
                    <?php echo form_close();?>
                    <br>

                    <div class="col-md-12 pull-right">
                        <p class="omb_forgotPwd">
                            <a href="<?php echo site_url('Login/Forgot_password') ?>">mot de passe oublier ?</a>
                        </p>
                    </div>

                    <?php if (validation_errors()) : ?>
                        <div class="col-md-12">
                            <div class="alert alert-danger" role="alert">
                                <?= validation_errors() ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($error)) : ?>
                        <div class="col-md-12">
                            <div class="alert alert-danger" role="alert">
                                <?= $error ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>




