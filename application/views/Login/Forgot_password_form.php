<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('Template/Header');?>

    <div id="loginbox" style="margin-top:150px;margin-bottom: 200px;"
         class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Mot de passe oublie </div>

            </div>

            <div style="padding-top:30px" class="panel-body">
                <?php  echo form_open('Login/resetPassowrd');?>
                <label>Si vous avez oublié votre mot de passe, nous pouvons vous envoyer un lien de réinitialisation à l'adresse e-mail enregistrée avec votre compte. S'il vous plaît remplir le formulaire ci-dessous et un lien devrait vous  envoyer en quelques minutes.</label><br>
                <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="email" class="form-control" name="emailRsest" placeholder="ecrire votre adresse mail " required>
                </div>
                <span class="help-block"></span>
                <br>
                <button class="btn btn-lg btn-danger btn-block" type="submit"> Envoyer </button><br>
                <div class="col-md-12 pull-right">
                    <p class="omb_forgotPwd">
                        <a href="<?php echo site_url('Login') ?>">se connecter</a>
                    </p>
                </div>
                <?php echo form_close();?>
                <br>
                <?php if (validation_errors()) : ?>
                    <div class="col-md-12">
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors() ?>
                        </div>
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


