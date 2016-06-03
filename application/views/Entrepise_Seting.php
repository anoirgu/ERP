<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('Template/MenueHeader');
$this->load->view('Template/Side_bar');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Information sur La societe
        </h1>

        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('Dashboard/') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Information sur La societe </li>
        </ol>
    </section>
    <br><br>
    <section class="content">
        <?php  if(empty($setting)){ ?>
            <div class="box">
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-9">
                            <h3>Bienvenu  ,  </h3>
                            <p> Vous n'avez pas encore terminer les informations concernant votre societe  </p>
                            <p>   </p>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-12">
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
                            <?php echo form_open_multipart('EntrepriseSetting/set_Setting' , 'class="form-horizontal" '); ?>
                            <fieldset>
                                <div class="row">
                                <div class="col-lg-6">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-md-4 control-label"
                                           for="fn">Nom Societe </label>

                                    <div class="col-md-8">
                                        <input id="postName" name="EntName"
                                               type="text"
                                               class="form-control input-md"
                                               required>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="col-md-4 control-label"
                                           for="ln">Forme Juridique </label>

                                    <div class="col-md-8">
                                        <input id="hour_cost" name="FormJuridique"
                                               type="text"
                                               class="form-control input-md"
                                               required>

                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="col-md-4 control-label"
                                           for="fn">Raison Social</label>

                                    <div class="col-md-8">
                                        <input id="postName" name="RaisSocial"
                                               type="text"
                                               class="form-control input-md"
                                               required>

                                    </div>
                                </div>
                                <br>
                                 <div class="form-group">
                                    <label class="col-md-4 control-label"
                                           for="ln">Adresse mail</label>
                                    <div class="col-md-8">
                                        <input id="hour_cost" name="Adrmail"
                                               type="email"
                                               class="form-control input-md"
                                               required>

                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="col-md-4 control-label"
                                           for="fn">Adresse</label>

                                    <div class="col-md-8">
                                        <input id="postName" name="Adresse"
                                               type="text"
                                               class="form-control input-md"
                                               required>

                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="col-md-4 control-label"
                                           for="fn">Code Postal</label>

                                    <div class="col-md-8">
                                        <input id="postName" name="CodePostal"
                                               type="text"
                                               class="form-control input-md"
                                               required>

                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="col-md-4 control-label"
                                           for="fn">Ville</label>

                                    <div class="col-md-8">
                                        <input id="postName" name="Ville"
                                               type="text"
                                               class="form-control input-md"
                                               required>

                                    </div>
                                </div>
                                <br>
                                 <div class="form-group">
                                    <label class="col-md-4 control-label"
                                           for="ln">Numero TVA Intra </label>

                                    <div class="col-md-8">
                                        <input id="hour_cost" name="NtvaIntra"
                                               type="text"
                                               class="form-control input-md"
                                               required>

                                    </div>
                                </div>

                                </div>
                                </div>
                                </div>
                                <div class="col-lg-6">
                                 <div class="panel panel-default">
                                    <div class="panel-body">
                                    <br>
                                <div class="form-group">
                                    <label class="col-md-4 control-label"
                                           for="ln">Code APE</label>

                                    <div class="col-md-8">
                                        <input id="hour_cost" name="CodeApe"
                                               type="text"
                                               class="form-control input-md"
                                               required>

                                    </div>
                                </div>
                                <br>
                                 <div class="form-group">
                                    <label class="col-md-4 control-label"
                                           for="ln">RCS</label>

                                    <div class="col-md-8">
                                        <input id="hour_cost" name="RCS"
                                               type="text"
                                               class="form-control input-md"
                                               required>

                                    </div>
                                </div>
                                <br>
                                 <div class="form-group">
                                    <label class="col-md-4 control-label"
                                           for="ln">Numero du Siret </label>

                                    <div class="col-md-8">
                                        <input id="hour_cost" name="NSiret"
                                               type="text"
                                               class="form-control input-md"
                                               required>

                                    </div>
                                </div>
                                 <br>
                                 <div class="form-group">
                                    <label class="col-md-4 control-label"
                                           for="ln">Numero telephone fixe</label>

                                    <div class="col-md-8">
                                        <input id="hour_cost" name="NtelephFixe"
                                               type="text"
                                               class="form-control input-md"
                                               required>

                                    </div>
                                </div>
                                 <br>
                                 <div class="form-group">
                                    <label class="col-md-4 control-label"
                                           for="ln">Numero telephone Mobile</label>

                                    <div class="col-md-8">
                                        <input id="hour_cost" name="NumeroMobile"
                                               type="text"
                                               class="form-control input-md"
                                               required>

                                    </div>
                                </div>
                                  <br>
                                <div class="form-group">
                                    <label class="col-md-4 control-label"
                                           for="ln">Numero de Fax</label>

                                    <div class="col-md-8">
                                        <input id="hour_cost" name="NumFax"
                                               type="text"
                                               class="form-control input-md"
                                               required>

                                    </div>
                                </div>


                                <br>
                                <div class="form-group">
                                    <label class="col-md-4 control-label"
                                           for="ln">Telecharger une Image</label>

                                    <div class="col-lg-8">
                                    <input type='file' name='userfile' size='20' id='file' class="form-control "
                                               required />
                                                 </div>
                                </div>

                               </div>
                               </div><br>
                                </div>
                                </div>
                              <div class="form-group">
                                    <label class="col-md-4 control-label"
                                           for="submit"></label>

                                    <div class="col-md-4">
                                        <button id="submit" name="submit"
                                                class="btn btn-primary btn-block">Ajouter
                                        </button>
                                    </div>
                                </div>
                            </fieldset>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="panel panel-default">
                <div class="panel-body">
              <center><img src="./uploads/<?php  echo $setting[0]->logo ;  ?>" class="img-fluid" alt="Responsive image" style="height:210px; width:557px  "></center><br>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="panel  panel-danger">
                                <div class="panel-heading ">
                                    <h5> Nom du Societe </h5>
                                </div>
                                <div class="panel-body ">
                                    <h4><?php echo $setting[0]->nom ; ?> </h4>
                                </div>
                            </div>
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h5>Forme Juridique </h5>
                                </div>
                                <div class="panel-body ">
                                    <h4><?php echo $setting[0]->form_juridique; ?></h4>
                                </div>
                            </div>
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h5> Raison Social  </h5>
                                </div>
                                <div class="panel-body ">
                                    <h4><?php echo $setting[0]->raison_social;?> </h4>
                                </div>
                            </div>
                             <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h5>Email </h5>
                                </div>
                                <div class="panel-body ">
                                    <h4><?php echo $setting[0]->email; ?>  </h4>
                                </div>
                            </div>
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h5> Adresse Du Societe </h5>
                                </div>
                                <div class="panel-body ">
                                    <h4><?php echo $setting[0]->adresse;?> </h4>
                                </div>
                            </div>
                             <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h5> Ville </h5>
                                </div>
                                <div class="panel-body ">
                                    <h4><?php echo $setting[0]->ville ; ?> </h4>
                                </div>
                            </div>
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h5> Code Postal </h5>
                                </div>
                                <div class="panel-body ">
                                    <h4><?php echo $setting[0]->code_postal ; ?> </h4>
                                </div>
                            </div>

                            </div>
                            <div class="col-lg-6">
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h5>Numero Tva Intra  </h5>
                                </div>
                                <div class="panel-body ">
                                    <h4><?php echo $setting[0]->n_tva_intra ; ?>  </h4>
                                </div>
                            </div>
                              <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h5>Code APE  </h5>
                                </div>
                                <div class="panel-body ">
                                    <h4><?php echo $setting[0]->code_ape ; ?>  </h4>
                                </div>
                            </div>
                              <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h5>RCS  </h5>
                                </div>
                                <div class="panel-body ">
                                    <h4><?php echo $setting[0]->rcs ; ?>  </h4>
                                </div>
                            </div>
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h5>Numero Du Siret  </h5>
                                </div>
                                <div class="panel-body ">
                                    <h4><?php echo $setting[0]->n_siret; ?>  </h4>
                                </div>
                            </div>
                             <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h5>Numero Du Tlelphone Fixe  </h5>
                                </div>
                                <div class="panel-body ">
                                    <h4><?php echo $setting[0]->n_tel_fix; ?>  </h4>
                                </div>
                            </div>
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h5>Numero Du Tlelphone Mobile </h5>
                                </div>
                                <div class="panel-body ">
                                    <h4><?php echo $setting[0]->n_tel_mobil; ?>  </h4>
                                </div>
                            </div>
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h5>Numero Du Fax </h5>
                                </div>
                                <div class="panel-body ">
                                    <h4><?php echo $setting[0]->n_fax; ?>  </h4>
                                </div>
                            </div>

                            </div>



                            <center><a href="#myModal" data-toggle="modal"> <button class="btn btn-success btn-block">Mise A jour   </button></a></center>
                            <div id="myModal" class="modal fade in"
                                 role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close"
                                                    data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Mise A jour des Information </h4>
                                        </div>
                                        <div class="modal-body">
                                           <?php echo form_open_multipart('EntrepriseSetting/set_Setting' , 'class="form-horizontal" '); ?>
                                            <fieldset>

                                                <div class="row">
                                                 <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label"
                                                           for="fn">Nom Du Societe</label>

                                                    <div class="col-md-8">
                                                        <input id="postName" name="EntName"
                                                               type="text"
                                                               class="form-control input-md"
                                                               value="<?php echo $setting[0]->nom  ; ?> "
                                                               required>

                                                    </div>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label"
                                                           for="ln">Forme Juridique</label>

                                                    <div class="col-md-8">
                                                        <input id="hour_cost" name="FormJuridique"
                                                               type="text"
                                                               class="form-control input-md"
                                                               value="<?php echo $setting[0]->form_juridique; ?>"
                                                               required>

                                                    </div>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label"
                                                           for="fn">Raison Social </label>

                                                    <div class="col-md-8">
                                                        <input id="postName" name="RaisSocial"
                                                               type="text"
                                                               class="form-control input-md"
                                                               value="<?php echo $setting[0]->raison_social ;?>"
                                                               required>

                                                    </div>
                                                </div>
                                                <br>
                                                 <div class="form-group">
                                                    <label class="col-md-4 control-label"
                                                           for="fn">Email</label>

                                                    <div class="col-md-8">
                                                        <input id="postName" name="Adrmail"
                                                               type="text"
                                                               class="form-control input-md"
                                                               value="<?php echo $setting[0]->email ; ?>"
                                                               required>

                                                    </div>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label"
                                                           for="fn">Adresse Du Societe</label>

                                                    <div class="col-md-8">
                                                        <input id="postName" name="Adresse"
                                                               type="text"
                                                               class="form-control input-md"
                                                               value="<?php echo $setting[0]->adresse;?>"
                                                               required>

                                                    </div>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label"
                                                           for="fn">Ville</label>

                                                    <div class="col-md-8">
                                                        <input id="postName" name="Ville"
                                                               type="text"
                                                               class="form-control input-md"
                                                               value=" <?php echo $setting[0]->ville ; ?>"
                                                               required>

                                                    </div>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label"
                                                           for="fn">Code Postal</label>

                                                    <div class="col-md-8">
                                                        <input id="postName" name="CodePostal"
                                                               type="text"
                                                               class="form-control input-md"
                                                               value="<?php echo $setting[0]->code_postal ; ?>"
                                                               required>

                                                    </div>
                                                </div>
                                                <br>
                                                 <div class="form-group">
                                                    <label class="col-md-4 control-label"
                                                           for="fn">Code APE</label>

                                                    <div class="col-md-8">
                                                        <input id="postName" name="CodeApe"
                                                               type="text"
                                                               class="form-control input-md"
                                                               value="<?php echo $setting[0]->code_ape ; ?>"
                                                               required>

                                                    </div>
                                                </div>

                                                </div>
                                                <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label"
                                                           for="fn">Numero Tva Intra</label>

                                                    <div class="col-md-8">
                                                        <input id="postName" name="NtvaIntra"
                                                               type="text"
                                                               class="form-control input-md"
                                                               value="<?php echo $setting[0]->n_tva_intra ; ?>"
                                                               required>

                                                    </div>
                                                </div>
                                                <br>
                                                  <div class="form-group">
                                                    <label class="col-md-4 control-label"
                                                           for="fn">RCS</label>

                                                    <div class="col-md-8">
                                                        <input id="postName" name="RCS"
                                                               type="text"
                                                               class="form-control input-md"
                                                               value="<?php echo $setting[0]->rcs ; ?>"
                                                               required>

                                                    </div>
                                                </div>
                                                <br>
                                                 <div class="form-group">
                                                    <label class="col-md-4 control-label"
                                                           for="fn">Numero Du Siret</label>

                                                    <div class="col-md-8">
                                                        <input id="postName" name="NSiret"
                                                               type="text"
                                                               class="form-control input-md"
                                                               value="<?php echo $setting[0]->n_siret ; ?>"
                                                               required>

                                                    </div>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label"
                                                           for="fn">Numero Du Telephone Fixe</label>

                                                    <div class="col-md-8">
                                                        <input id="postName" name="NtelephFixe"
                                                               type="text"
                                                               class="form-control input-md"
                                                               value="<?php echo $setting[0]->n_tel_fix ; ?>"
                                                               required>

                                                    </div>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label"
                                                           for="fn">Numero Du Telephone Mobile</label>

                                                    <div class="col-md-8">
                                                        <input id="postName" name="NumeroMobile"
                                                               type="text"
                                                               class="form-control input-md"
                                                               value="<?php echo $setting[0]->n_tel_mobil ; ?>"
                                                               required>

                                                    </div>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label"
                                                           for="fn">Numero Du Fax</label>

                                                    <div class="col-md-8">
                                                        <input id="postName" name="NumFax"
                                                               type="text"
                                                               class="form-control input-md"
                                                               value="<?php echo $setting[0]->n_fax ; ?>"
                                                               required>

                                                    </div>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                <label class="col-md-4 control-label"
                                                  for="ln">Telecharger une Image</label>

                                               <div class="col-lg-8">
                                               <input type='file' name='userfile' size='20' id='file' class="form-control "
                                               required />
                                                 </div>
                                               </div>
                                                 <br>
                                                 </div>
                                                 </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label"
                                                           for="submit"></label>

                                                    <div class="col-md-4">
                                                        <button id="submit" name="submit"
                                                                class="btn btn-primary btn-block">Mise A jour
                                                        </button>
                                                    </div>
                                                </div>

                                            </fieldset>
                                            <?php echo form_close(); ?>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div></div></div>


            </div>

        <?php }?>












    </section>
</div>


<?php
$this->load->view('Template/Footer');
?>
