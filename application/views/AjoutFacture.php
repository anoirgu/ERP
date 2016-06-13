<?php
$this->load->view('Template/MenueHeader');
$this->load->view('Template/Side_bar');
?>
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Ajouter une Facture
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('Dashboard/') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Ajouter une Facture</li>
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
                                            <div class="form-group">
                                                <?php if( empty($_SESSION['clientFacture'])){ ?>
                                                    <?php echo form_open('Facture/choisirClient','" id="form" class="form-horizontal"'); ?>
                                                    <div class="row">
                                                        <div class="col-lg-3"></div>
                                                        <div class="col-lg-6">
                                                            <div class="panel panel-default">
                                                                <div class="panel-heading">Choisir Le Client </div>
                                                                <div class="panel-body">
                                                                    <label class="col-md-4 control-label"
                                                                           for="fn">  </label>
                                                                    <div class="col-md-8">
                                                                        <select name="client" id="client">
                                                                            <?php foreach ($client as $client){ ?>
                                                                                <option value="<?php echo  $client->id ; ?>"><?php echo $client->nom." ".$client->prenom ; ?></option>
                                                                            <?php }?>
                                                                        </select>
                                                                        <a href="<?php echo base_url('GestionClient/Ajouter')?>">Ajouter</a>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-md-2 control-label" for="submit"></label>
                                                                        <label class="col-md-3 control-label" for="submit"></label>
                                                                        <button type="submit" id="btnSave" style="margin-top: 70px ; margin-left: -30px" class="btn btn-primary ">Choisir Client</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3"></div>
                                                        <?php echo form_close(); ?>
                                                    </div>
                                                <?php }else{
                                                echo "Bon Livraison Pour  : ".$clientchoisi[0]->nom.' '.$clientchoisi[0]->prenom  ;
                                                ?>
                                                <select id="client" hidden>
                                                    <option value="<?php echo $clientchoisi[0]->id; ?>"></option>
                                                </select>
                                            </div>
                                            <br>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">Choisir Les produits</div>
                                                <div class="panel-body">
                                                    <div class="box-body">
                                                        <div class="dataTables_wrapper form-inline dt-bootstrap" >
                                                            <div class="row">
                                                                <table aria-describedby="example1_info" role="grid" id="example1" class="table results table-bordered table-striped dataTable">
                                                                    <thead>
                                                                    <tr role="row">
                                                                        <th aria-label="Designation : activate to sort column ascending" style="width: 105px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting">Designation </th>
                                                                        <th aria-label="Qauntite EN Stock : activate to sort column ascending" style="width: 180px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting">Qauntite EN Stock</th>
                                                                        <th aria-sort="Prix De Vente" aria-label="Fonction: activate to sort column ascending" style="width: 161px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting_desc">Prix De Vente</th>
                                                                        <th aria-sort="Ajouter Au Panier" aria-label="Fonction: activate to sort column ascending" style="width: 161px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting_desc">Ajouter Au Panier</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody >
                                                                    <?php
                                                                    $i = 1;
                                                                    foreach ($productlist as $emplistid) {

                                                                        ?>
                                                                        <tr>
                                                                            <td> <?php echo $emplistid->designation ?></td>
                                                                            <td><?php echo $emplistid->quantite ?></td>
                                                                            <td><?php   echo $emplistid->prixventettc ; ?></td>
                                                                            <td><a href="#myModal<?php echo $i; ?>" data-toggle="modal"><i class="fa fa-plus"></i></a></td></tr>
                                                                        <div id="myModal<?php echo $i; ?>" class="modal fade in"
                                                                             role="dialog">
                                                                            <div class="modal-dialog">
                                                                                <!-- Modal content-->
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <button type="button" class="close"
                                                                                                data-dismiss="modal">&times;</button>
                                                                                        <h4 class="modal-title">Ajouter Produit</h4>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <?php echo form_open('Facture/AddFacture' , 'class="form-horizontal"'); ?>
                                                                                        <fieldset>
                                                                                            <input value="<?php echo $emplistid->idp ;  ?>" name="id" hidden>
                                                                                            <hr>
                                                                                            <div class="form-group">
                                                                                                <label class="col-md-5 control-label" for="fn">Designation</label>
                                                                                                <div class="col-md-7">
                                                                                                    <input id="postName" name="designation"
                                                                                                           type="text"
                                                                                                           value="<?php echo $emplistid->designation; ?>"
                                                                                                           class="form-control input-md"
                                                                                                           disabled>
                                                                                                </div>
                                                                                            </div>
                                                                                            <br><br>
                                                                                            <div class="form-group">
                                                                                                <label class="col-md-5 control-label" for="ln">Quantite Stock</label>
                                                                                                <div class="col-md-7">
                                                                                                    <input id="hour_cost" name=""
                                                                                                           type="number"
                                                                                                           value="<?php echo $emplistid->quantite; ?>"
                                                                                                           class="form-control input-md"
                                                                                                           disabled>
                                                                                                </div>
                                                                                            </div>
                                                                                            <br><br>
                                                                                            <div class="form-group">
                                                                                                <label class="col-md-5 control-label" for="ln">Quantite</label>
                                                                                                <div class="col-md-7">
                                                                                                    <input id="hour_cost" name="quantite"
                                                                                                           type="number"
                                                                                                           class="form-control input-md"
                                                                                                           required="">
                                                                                                </div>
                                                                                            </div>
                                                                                            <br><br>
                                                                                            <div class="form-group">
                                                                                                <label class="col-md-5 control-label"
                                                                                                       for="ln">Prix  Vente</label>

                                                                                                <div class="col-md-7">
                                                                                                    <input id="hour_cost" name="prixvente"
                                                                                                           type="number"
                                                                                                           class="form-control input-md"
                                                                                                           value="<?php echo $emplistid->prixventettc; ?>"
                                                                                                           required="">

                                                                                                </div>
                                                                                            </div>
                                                                                            <br><br>
                                                                                            <div class="form-group">
                                                                                                <label class="col-md-5 control-label"
                                                                                                       for="ln">Remise</label>

                                                                                                <div class="col-md-7">
                                                                                                    <input id="hour_cost" name="remise"
                                                                                                           type="number"
                                                                                                           class="form-control input-md"
                                                                                                    >
                                                                                                </div>
                                                                                            </div><br><br>

                                                                                            <div class="form-group pull-right">
                                                                                                <div class="col-md-5">
                                                                                                    <button id="submit" name="submit"
                                                                                                            class="btn btn-primary">Ajouter
                                                                                                    </button>
                                                                                                </div>
                                                                                            </div>

                                                                                        </fieldset>
                                                                                        <?php echo form_close(); ?>


                                                                                    </div>

                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <?php $i++;
                                                                    } ?>



                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>

                                                        <!--user list -->
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="col-md-2 control-label" for="submit"></label>
                                            <label class="col-md-2 control-label" for="submit"></label>
                                            <a href="<?php echo base_url('Facture/ajoutFacture');?>" class="btn  btn-success btn-lg">Ajouter Facture</a>
                                            <a href="<?php echo base_url('Facture/annuler');?>" class="btn  btn-danger btn-lg">Annuler</a>
                                        </div>

                                    </div>
                                </div>

                                    <?php } ?>

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
    <script>
        $(function () {
            $('#example1').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>
</div>
<?php
$this->load->view('Template/Footer');
?>


