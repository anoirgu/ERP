<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('Template/MenueHeader');
$this->load->view('Template/Side_bar');
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<div style="min-height: 862px;" class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Ajouter Un bon De Livraison
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Accueil</a></li>
            <li class="active">Ajout Bon Livraison</li>
        </ol>
    </section>
    <section class="content">
       <div class="panel panel-default">
           <div class="panel-body">

               <div class="row">

                   <div class="col-lg-12">
                       <?php if (validation_errors()) : ?>
                           <div class="col-lg-12">
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
                       <?php echo form_open('Bonlivraison/imprimer' , 'class="form-horizontal" '); ?>
                       <fieldset>
                           <div class="row">
                               <div class="col-lg-12">
                                   <div class="panel panel-default">
                                       <div class="panel-body">
                                           <div class="form-group">
                                               <label class="col-md-4 control-label"
                                                      for="fn">Choisir le Client  </label>
                                               <div class="col-md-8">
                                                  <select name="client">
                                                      <?php foreach ($client as $client){ ?>
                                                      <option value="<?php echo  $client->id ; ?>"><?php echo $client->nom." ".$client->prenom ; ?></option>
                                                      <?php }?>
                                                  </select>
                                                   <a href="<?php echo base_url('GestionClient/Ajouter')?>">Ajouter</a>
                                               </div>
                                           </div>
                                           <br>
                                       <div class="panel panel-default">
                                           <div class="panel-heading">Choisir Les produits</div>
                                           <div class="panel-body">
                                           <div class="form-group">
                                               <div class="col-md-4">
                                                   <label> Produit </label>

                                                   <select name="prod" id="produit">
                                                       <?php foreach ($product as $product){ ?>
                                                           <option  id="produit" value="<?php echo $product->idp ?>"><?php echo $product->designation ?></option>
                                                       <?php } ?>
                                                   </select>
                                                   <input type="button" value="Ajouter" id="add">
                                               </div><br>
                                               <div ><br>
                                                   <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                       <thead>
                                                       <tr>
                                                           <th>Designation</th>
                                                           <th>Prix Achat</th>
                                                           <th>TVA</th>
                                                           <th>Quantite</th>
                                                           <th>Prix TTC</th>
                                                       </tr>
                                                       </thead>
                                                       <tbody>
                                                       <?php if(!empty($bonlivraison)){
                                                         foreach ($bonlivraison as $bon){?>
                                                             <tr>
                                                                 <td><?php echo $bon->designation ?></td>
                                                                 <td><?php echo $bon->prixachat ?></td>
                                                                 <td><?php echo $bon->tva ?></td>
                                                                 <td><?php echo $bon->quantite ?></td>
                                                                 <td><?php echo $bon->prixvente ?></td>
                                                             </tr>
                                                       <?php }}?>
                                                       </tbody>
                                                       </table>

                                               </div>


                                           </div>
                                              </div>
                                           </div>

                                           <div class="form-group">
                                               <label class="col-md-4 control-label"
                                                      for="submit"></label>

                                               <div class="col-md-4">
                                                   <button id="submit" name="submit"
                                                           class="btn btn-primary btn-block">Imprimer
                                                   </button>
                                               </div>
                                           </div>
                       </fieldset>
                       <?php echo form_close(); ?>
                   </div>






<script type="text/javascript">

    var save_method; //for save method string
    var table;

  $(document).ready(function () {
    $('#add').click(function () {
        var id = $('#produit option:selected').val() ;
        $.ajax({
            type:'GET',
            data:{id : id},
            url : '<?php echo base_url('Bonlivraison/addProduit') ;?>/'+id,
            success:function (datat) {
                var data = datat.split(',');
                var prixachat = parseInt(data[2].split(':')[1].substring(1,data[2].split(':')[1].length-1)) ;
                var tva = parseInt(data[3].split(':')[1].substring(1,data[3].split(':')[1].length-1));
                $('[name="id"]').val(data[0].split(':')[1]);
                $('[name="designation"]').val(data[1].split(':')[1].substring(1,data[1].split(':')[1].length-1));
                $('[name="prixachat"]').val(prixachat);
                $('[name="quantite"]').val(parseInt(data[6].split(':')[1].substring(1,data[6].split(':')[1].length-1)));
                $('[name="tva"]').val(tva);
                $('[name="prixvente"]').val(prixachat*tva);
                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Ajouter Produit'); // Set title to Bootstrap modal title
            }
        });
    });
  });


</script>



                                           <!-- Bootstrap modal -->
                                           <div class="modal fade" id="modal_form" role="dialog">
                                               <div class="modal-dialog">
                                                   <div class="modal-content">
                                                       <div class="modal-header">
                                                           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                           <h3 class="modal-title">Person Form</h3>
                                                       </div>
                                                       <div class="modal-body form">
                                                           <?php echo form_open('Bonlivraison/addbonlivraison','" id="form" class="form-horizontal"'); ?>
                                                               <input type="hidden" value="" name="id"/>
                                                               <div class="form-body">
                                                                   <div class="form-group">
                                                                       <label class="control-label col-md-3">Designation</label>
                                                                       <div class="col-md-9">
                                                                           <input name="designation" placeholder="Designation" class="form-control" type="text">
                                                                           <span class="help-block"></span>
                                                                       </div>
                                                                   </div>
                                                                   <div class="form-group">
                                                                       <label class="control-label col-md-3">Prix Achat</label>
                                                                       <div class="col-md-9">
                                                                           <input name="prixachat" placeholder="Prix Achat" class="form-control" type="number">
                                                                           <span class="help-block"></span>
                                                                       </div>
                                                                   </div>
                                                                   <div class="form-group">
                                                                       <label class="control-label col-md-3">TVA</label>
                                                                       <div class="col-md-9">
                                                                           <input name="tva" placeholder="TVA" class="form-control" type="text">
                                                                           <span class="help-block"></span>
                                                                       </div>
                                                                   </div>
                                                                   <div class="form-group">
                                                                       <label class="control-label col-md-3">Quantite</label>
                                                                       <div class="col-md-9">
                                                                           <input name="quantite" placeholder="quantite" class="form-control" type="number">
                                                                           <span class="help-block"></span>
                                                                       </div>
                                                                   </div>
                                                                   <div class="form-group">
                                                                       <label class="control-label col-md-3">Prix Vente</label>
                                                                       <div class="col-md-9">
                                                                           <input name="prixvente" placeholder="Prix Vente" class="form-control " type="number">
                                                                           <span class="help-block"></span>
                                                                       </div>
                                                                   </div>
                                                               </div>
                                                           </>
                                                       </div>
                                                       <div class="modal-footer">
                                                           <button type="submit" id="btnSave"  class="btn btn-primary">Save</button>
                                                           <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                       </div>
                                                   </div><!-- /.modal-content -->
                                               </div><!-- /.modal-dialog -->
                                           </div><!-- /.modal -->
                                           <!-- End Bootstrap modal -->


























               </div>







           </div>
       </div>

        </section>
    </div>
<?php
$this->load->view('Template/Footer');
?>


