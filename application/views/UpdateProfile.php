<?php
$this->load->view('Template/MenueHeader');
$this->load->view('Template/Side_bar');
?>
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>

        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('Dashboard/') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Mise A jour  Du Profile</li>
        </ol>
    </section>
    <hr>
    <section class="content">


        <div class="panel panel-default">
            <div class="panel-body">
                <h3>  Mise A jour du  Profile</h3><br><br>
                <?php if (validation_errors()) : ?>
                    <div class="col-md-12">
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors() ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if (isset($error)) : ?>
                    <div class="col-md-12">
                        <div class="alert alert-succes" role="alert">
                            <?= $error ?>
                        </div>
                    </div>
                <?php endif; ?>


                <?php  echo form_open('Dashboard/miseaJourProfile') ?>

                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-4 control-label"
                                   for="fn">Email :</label>
                            <div class="input-group col-md-8">
                                <div class="input-group-addon">
                                    <i class="fa  fa-envelope"></i>
                                </div>
                                <input type="email" name="mail"  value="<?php echo $profile[0]->email ;  ?>" ">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-4 control-label"
                                   for="fn">Changer Mot De Passe :</label>
                            <div class="input-group col-md-8">
                                <div class="input-group-addon">
                                    <i class="fa fa-user-secret"></i>
                                </div>
                                <input type="password" name="password" >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-4 control-label"
                                   for="fn">Recrire le Mot De Passe :</label>
                            <div class="input-group col-md-8">
                                <div class="input-group-addon">
                                    <i class="fa fa-user-secret"></i>
                                </div>
                                <input type="password" name="repassword" >
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-4 control-label"
                                   for="submit"></label>

                            <div class="col-md-4">
                                <button id="submit" name="submit"
                                        class="btn btn-primary">Mise A jour
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>

            </div>
        </div>







        </section>
    </div>
<?php
$this->load->view('Template/Footer');
?>
