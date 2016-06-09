<?php
$this->load->view('Template/MenueHeader');
$this->load->view('Template/Side_bar');
?>
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Ajouter un Devis
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('Dashboard/') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Ajout Du Devis</li>
        </ol>
    </section>
    <hr>
    <section class="content">

        <div class="panel panel-default">
            <div class="panel-body">

                <div class="row">
                    <div class="col-lg-12">
                        <fieldset>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <?php echo form_open('Devis/AddDevis','" id="form" class="form-horizontal"'); ?>
                                            <div class="form-group">
                                                <?php if(empty($devis)){ ?>
                                                    <label class="col-md-4 control-label"
                                                           for="fn">Choisir le Client  </label>
                                                    <div class="col-md-8">
                                                        <select name="client" id="client">
                                                            <?php foreach ($client as $client){ ?>
                                                                <option value="<?php echo  $client->id ; ?>"><?php echo $client->nom." ".$client->prenom ; ?></option>
                                                            <?php }?>
                                                        </select>
                                                        <a href="<?php echo base_url('GestionClient/Ajouter')?>">Ajouter</a>
                                                    </div><br><br>
                                                <?php }else{
                                                    echo "Devis  Pour  : ".$clientchoisi[0]->nom.' '.$clientchoisi[0]->prenom  ;
                                                    ?>
                                                    <select id="client" hidden>
                                                        <option value="<?php echo $clientchoisi[0]->id; ?>"></option>
                                                    </select>

                                                <?php } ?>

                                            </div>
                                            <br>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">Choisir Les produits</div>
                                                <div class="panel-body">
                                                    <input type="hidden" value="" name="id"/>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Designation</label>
                                                        <div class="col-md-9">
                                                            <input name="designation" id="add" placeholder="Designation" required class="form-control" type="text">
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Quantite En Stock </label>
                                                        <div class="col-md-9">
                                                            <input name="quantiteStock" id="stock" disabled class="form-control" type="number">
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Quantite</label>
                                                        <div class="col-md-9">
                                                            <input name="quantite" id="qauntitevendu" placeholder="quantite" class="form-control" required type="number">
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Prix Vente</label>
                                                        <div class="col-md-9">
                                                            <input name="prixvente" placeholder="Prix Vente" class="form-control " required type="number">
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label" for="submit"></label>
                                                        <label class="col-md-2 control-label" for="submit"></label>
                                                        <label class="col-md-2 control-label" for="submit"></label>
                                                        <button type="submit" id="btnSave"  class="btn btn-primary btn-lg">Ajouter</button>
                                                    </div>
                                                    <?php echo  form_close(); ?>
                                                </div>

                                            </div>


                                        </div>
                                        <div class="col-md-12">
                                            <label class="col-md-2 control-label" for="submit"></label>
                                            <label class="col-md-2 control-label" for="submit"></label>
                                            <a href="<?php echo base_url('Devis/ajoutDevis');?>" class="btn  btn-success btn-lg">Ajouter Devis</a>
                                            <a href="<?php echo base_url('Devis/annuler');?>" class="btn  btn-danger btn-lg">Annuler</a>
                                        </div>

                                    </div>
                                </div>



                        </fieldset>
                    </div>




                    <script type="text/javascript">
                        var save_method; //for save method string
                        var table;
                        $(document).ready(function () {
                            $('#add').keyup(function () {
                                var name = $('#add').val() ;
                                if(name!="") {
                                    $.ajax({
                                        type: 'GET',
                                        data: {id: name},
                                        url: '<?php echo base_url('Bonlivraison/addProduit');?>/' + name,
                                        success: function (datat) {
                                            if (datat.length != 2) {
                                                var data = datat.split(',');
                                                $('[name="id"]').val(data[0].split(':')[1]);
                                                $('[name="designation"]').val(data[1].split(':')[1].substring(1, data[1].split(':')[1].length - 1));
                                                $('[name="quantiteStock"]').val(parseInt(data[6].split(':')[1].substring(1, data[6].split(':')[1].length - 1)));
                                                $('[name="prixvente"]').val(parseInt(data[5].split(':')[1].substring(1, data[5].split(':')[1].length - 1)));
                                            } else {


                                            }
                                        }
                                    });
                                }
                            });
                            $('#qauntitevendu').keyup(function () {
                                var qauntitevendu = parseInt($('#qauntitevendu').val());
                                var quantitestock = parseInt($('#stock').val());
                                if(quantitestock<qauntitevendu){
                                    alert("La Qauntite en stock n'est pas suffisante pour cette vente ! ") ;
                                    $('#qauntitevendu').val(quantitestock);
                                }
                            });
                        });


                    </script>



                </div>
            </div>
    </section>

        


        </section>
    </div>
<?php
$this->load->view('Template/Footer');
?>


