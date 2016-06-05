<?php
$this->load->view('Template/MenueHeader');
$this->load->view('Template/Side_bar');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Ajouter un Produit
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('Dashboard/') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Ajout Du Produit</li>
        </ol>
    </section>
    <hr>
     <section class="content">
      <div class="panel panel-default">
          <div class="panel-body">
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
                    <?php echo form_open_multipart('GestionProduit/addProduct' , 'class="form-horizontal" '); ?>
                    <fieldset>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label"
                                                   for="fn">Reference </label>
                                            <div class="col-md-8">
                                                <input id="postName" name="reference"
                                                       type="text"
                                                       class="form-control input-md"
                                                       required>
                                            </div>
                                        </div>
                                        <br>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label"
                                                   for="fn">Designation </label>
                                            <div class="col-md-8">
                                                <input id="postName" name="designation"
                                                       type="text"
                                                       class="form-control input-md"
                                                       required>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label"
                                                   for="fn">Fournisseur</label>
                                            <div class="col-md-8">
                                                <select name="fournisseur">
                                                    <?php foreach ($listfournisseur as $list){ ?>
                                                    <option value="<?php echo $list->id ?>"><?php echo $list->nom ." ".$list->prenom ;?> </option>
                                                <?php }?>
                                                </select>
                                                <a href="<?php echo base_url('GestionProduit/AjouterFournisseur')?>">Ajouter</a>

                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label"
                                                   for="ln">Quantite</label>

                                            <div class="col-md-8">
                                                <input id="hour_cost" name="quantite"
                                                       type="number"
                                                       class="form-control input-md"
                                                       required>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label"
                                                   for="ln">Prix D'achat</label>

                                            <div class="col-md-8">
                                                <input id="prixachat" name="prixachat"
                                                       type="text"
                                                       class="form-control input-md"
                                                       required>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label"
                                                   for="ln">TVA </label>

                                            <div class="col-md-8">
                                                <input id="marght" name="margeht"
                                                       type="text"
                                                       class="form-control input-md"
                                                       required value="<?php echo $setting[0]->defaulttva ;  ?>">
                                            </div>
                                        </div>
                                        <!-- 
                                        <div class="form-group">
                                            <label class="col-md-4 control-label"
                                                   for="ln">Taxe </label>

                                            <div class="col-md-8">
                                                <input id="hour_cost" name="tax"
                                                       type="text"
                                                       class="form-control input-md"
                                                       required value="<?php echo $setting[0]->defaulttax ;  ?>">
                                            </div>
                                        </div>-->
                                        <br>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label"
                                                   for="ln">Prix De Vente </label>

                                            <div class="col-md-8">
                                                <input id="hour_cost" name="prixvente"
                                                       type="text"
                                                       class="form-control input-md"
                                                       >
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group" >
                                            <label class="col-md-4 control-label"
                                                   for="ln">Telecharger une Image</label>

                                            <div class="col-lg-8">
                                                <input type='file' name='userfile' size='20' id='file' class="form-control "
                                                       required />
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
          <div class="col-lg-2"></div>
      </div>










    </section>
</div>
<?php
$this->load->view('Template/Footer');
?>



