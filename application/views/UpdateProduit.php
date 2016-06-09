<?php
$this->load->view('Template/MenueHeader');
$this->load->view('Template/Side_bar');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Mise A jour Produit
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('Dashboard/') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Mise A jour Du Produit</li>
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
                        <?php echo form_open_multipart('GestionProduit/MiseAjourProduct' , 'class="form-horizontal" '); ?>
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
                                                           required value="<?php echo $product[0]->reference ?>" >
                                                </div>
                                            </div>
                                            <br>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label"
                                                       for="fn">Designation </label>
                                                <div class="col-md-8">
                                                    <input id="postName" name="designation"
                                                           type="text"
                                                           class="form-control input-md" value="<?php echo $product[0]->designation ?>"
                                                           required>
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
                                                           required value="<?php echo $product[0]->quantite ?>">
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
                                                           required value="<?php echo $product[0]->prix_achat ?>">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label"
                                                       for="ln">Marge Brute </label>

                                                <div class="col-md-8">
                                                    <input id="marght" name="margeht"
                                                           type="text"
                                                           class="form-control input-md"
                                                           required value="<?php echo $product[0]->marge_ht ?>">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label"
                                                       for="ln">Taxe </label>

                                                <div class="col-md-8">
                                                    <input id="hour_cost" name="tax"
                                                           type="text"
                                                           class="form-control input-md"
                                                           required value="<?php echo $product[0]->taxe ?>">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label"
                                                       for="ln">Prix De Vente </label>

                                                <div class="col-md-8">
                                                    <input id="hour_cost" name="prixvente"
                                                           type="text"
                                                           class="form-control input-md"
                                                            value="<?php echo $product[0]->prixventettc ; ?>"  >
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



