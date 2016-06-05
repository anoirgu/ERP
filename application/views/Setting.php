<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('Template/MenueHeader');
$this->load->view('Template/Side_bar');
?>
<div style="min-height: 862px;" class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Configuration
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('Dashboard') ?>"><i class="fa fa-dashboard"></i>Accueil</a></li>
            <li class="active">Configuration</li>
        </ol>
    </section>
    <?php if(empty($setting)){ ?>
    <section class="content">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-10">
                <?php if (validation_errors()) : ?>
                    <div class="col-md-12">
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors() ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if (isset($error)) : ?>
                    <div class="col-lg-12">
                        <div class="alert alert-succes" role="alert">
                            <?= $error ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php echo form_open('Dashboard/Setsetting ' , 'class="form-horizontal" '); ?>
                <fieldset>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="panel panel-default">
                                <div class="panel-body">

                                    <div class="form-group">
                                        <label class="col-md-4 control-label"
                                               for="fn">Pied Page Devis </label>
                                        <div class="col-md-8">
                                            <input id="postName" name="piedpagedevis"
                                                   type="text"
                                                   class="form-control input-md"
                                                   required   >
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"
                                               for="fn">Pied Page Facture </label>
                                        <div class="col-md-8">
                                            <input id="postName" name="piedpagefacture"
                                                   type="text"
                                                   class="form-control input-md"
                                                   required >
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"
                                               for="fn">TVA par defeaut </label>
                                        <div class="col-md-8">
                                            <input id="postName" name="defaulttva"
                                                   type="text"
                                                   class="form-control input-md"
                                                   required >
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"
                                               for="fn">Taxe Par defaut </label>
                                        <div class="col-md-8">
                                            <input id="postName" name="defaulttaxe"
                                                   type="text"
                                                   class="form-control input-md"
                                                   required >
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"
                                               for="fn">Frais de port </label>
                                        <div class="col-md-8">
                                            <input id="postName" name="fraisport"
                                                   type="text"
                                                   class="form-control input-md"
                                                   required >
                                        </div>
                                    </div>
                                    <br>



                                    <div class="form-group">
                                        <label class="col-md-4 control-label"
                                               for="submit"></label>

                                        <div class="col-md-4">
                                            <button id="submit" name="submit"
                                                    class="btn btn-primary btn-block">Ajouter
                                            </button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </fieldset>
                <?php echo form_close(); ?>
            </div>
 <div class="col-lg-2"></div>
</div>

        </section>
    <?php }else { ?>
    <section class="content">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-10">
                <?php if (validation_errors()) : ?>
                    <div class="col-md-12">
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors() ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if (isset($error)) : ?>
                    <div class="col-lg-12">
                        <div class="alert alert-succes" role="alert">
                            <?= $error ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php echo form_open('Dashboard/Setsetting ' , 'class="form-horizontal" '); ?>
                <fieldset>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="panel panel-default">
                                <div class="panel-body">

                                    <div class="form-group">
                                        <label class="col-md-4 control-label"
                                               for="fn">Pied Page Devis </label>
                                        <div class="col-md-8">
                                            <input id="postName" name="piedpagedevis"
                                                   type="text"
                                                   class="form-control input-md"
                                                   required value="<?php echo $setting[0]->pieddevis ?>"  >
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"
                                               for="fn">Pied Page Facture </label>
                                        <div class="col-md-8">
                                            <input id="postName" name="piedpagefacture"
                                                   type="text"
                                                   class="form-control input-md"
                                                   required value="<?php echo $setting[0]->piedfacture ?>">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"
                                               for="fn">TVA par defeaut </label>
                                        <div class="col-md-8">
                                            <input id="postName" name="defaulttva"
                                                   type="text"
                                                   class="form-control input-md"
                                                   required value="<?php echo $setting[0]->defaulttva ?>">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"
                                               for="fn">Taxe Par defaut </label>
                                        <div class="col-md-8">
                                            <input id="postName" name="defaulttaxe"
                                                   type="text"
                                                   class="form-control input-md"
                                                   required value="<?php echo $setting[0]->defaulttax ?>">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"
                                               for="fn">Frais de port </label>
                                        <div class="col-md-8">
                                            <input id="postName" name="fraisport"
                                                   type="text"
                                                   class="form-control input-md"
                                                   required value="<?php echo $setting[0]->fraisport ?>">
                                        </div>
                                    </div>
                                    <br>



                                    <div class="form-group">
                                        <label class="col-md-4 control-label"
                                               for="submit"></label>

                                        <div class="col-md-4">
                                            <button id="submit" name="submit"
                                                    class="btn btn-primary btn-block">Mise A jour
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <?php echo form_close(); ?>
            </div>
            <div class="col-lg-2"></div>
        </div>

    </section>
    <?php } ?>















    </div>
<?php
$this->load->view('Template/Footer');
?>

