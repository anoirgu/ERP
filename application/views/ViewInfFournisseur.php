<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('Template/MenueHeader');
$this->load->view('Template/Side_bar');
?>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Information Sur le Fournisseur  <?php  echo $fournisseur[0]->nom." ".$fournisseur[0]->prenom ;   ?>
            </h1>

            <ol class="breadcrumb">
                <li><a href="<?php echo site_url('Dashboard/') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Information Sur Fournisseur </li>
            </ol>
        </section>
        <section class="content">
            <div class="panel">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Information Générale </div>
                            <div class="panel-body">
                                <h3>  <label class="label label-warning">Nom :</label>  <?php echo  "  ".$fournisseur[0]->nom." ".$fournisseur[0]->prenom ;   ?></h3><br>
                                <h3>  <label class="label label-warning">Raison Social :</label>  <?php  echo"  ".$fournisseur[0]->raisonsocial  ;  ?></h3><br>
                                <h3>  <label class="label label-warning">Adresse :</label>  <?php  echo"  ".$fournisseur[0]->adresse." , ".$fournisseur[0]->pays." ".$fournisseur[0]->ville." ".$fournisseur[0]->code_postal ;   ?></h3><br>
                                <h3>  <label class="label label-warning">Contact :</label>  <?php  echo" Telephone Fix :  ".$fournisseur[0]->telephone." , Mobile : ".$fournisseur[0]->mobile ;   ?></h3><br>
                                <h3>  <label class="label label-warning">Email :</label>  <?php  echo"  ".$fournisseur[0]->email  ;  ?></h3><br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Liste Des Produits </div>
                            <div class="panel-body">
                                <div class="box-body">
                                <div class="dataTables_wrapper form-inline dt-bootstrap" >
                                    <div class="row">
                                        <table aria-describedby="example1_info" role="grid" id="example1" class="table results table-bordered table-striped dataTable">
                                            <thead>
                                            <tr role="row">
                                                <th aria-label="Photo : activate to sort column ascending" style="width: 105px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting">Photo  </th>
                                                <th aria-label="Designation : activate to sort column ascending" style="width: 180px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting">Designation</th>
                                                <th aria-sort="Quantite en stock " aria-label="Fonction: activate to sort column ascending" style="width: 161px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting_desc">Quantite </th>
                                                <th aria-sort="Prix De Vente" aria-label="Fonction: activate to sort column ascending" style="width: 161px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting_desc">Prix De Vente</th>
                                                <th aria-sort="Prix D'Achat" aria-label="Fonction: activate to sort column ascending" style="width: 161px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting_desc">Prix D'Achat</th>
                                                <th aria-sort="Mise A jour" aria-label="Fonction: activate to sort column ascending" style="width: 161px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting_desc">Mise A jour </th>
                                                <th aria-sort="Supprimer" aria-label="Fonction: activate to sort column ascending" style="width: 161px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting_desc">Supprimer</th>
                                            </tr>
                                            </thead>
                                            <tbody >
                                            <?php
                                            $i = 1;
                                            foreach ($product as $emplistid) {

                                                ?>
                                                <tr>
                                                    <td><img src=" <?php echo base_url('ProductImage/'.$emplistid->logo) ; ?>" style="height:100px;width: 100px;"></td>
                                                    <td><?php echo $emplistid->designation  ;?>   </td>
                                                    <td><?php echo $emplistid->quantite ?></td>
                                                    <td><?php   echo $emplistid->prixventettc ; ?></td>
                                                    <td><?php echo $emplistid->prix_achat ?></td>
                                                    <td>
                                                        <a href="<?php echo  base_url('GestionProduit/update_Produit/'.$emplistid->idp)?>" > <i
                                                                class="fa fa-edit"></i></a></td>
                                                    <td>
                                                        <a href="<?php echo base_url('GestionProduit/delet_Produit/'.$emplistid->idp); ?>">
                                                            <i class="fa fa-trash-o"></i></a>
                                                    </td>

                                                </tr>
                                                <?php $i++;
                                            } ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                         </div>

                                
                                
                                
                                
                                


                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn-block btn-success" onclick="history.back(-1)">Retour </button>
            </div>
        </section>

    </div>
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
<?php
$this->load->view('Template/Footer');
?>