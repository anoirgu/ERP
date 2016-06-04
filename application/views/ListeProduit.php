<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('Template/MenueHeader');
$this->load->view('Template/Side_bar');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Liste Des Produits
        </h1>

        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('Dashboard/') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Liste Des Produit </li>
        </ol>
    </section>
    <section class="content">
        <div class="panel">
            <div class="panel-body">
                <div class="box-body">
                    <div class="dataTables_wrapper form-inline dt-bootstrap" >
                        <div class="row">
                            <table aria-describedby="example1_info" role="grid" id="example1" class="table results table-bordered table-striped dataTable">
                                <thead>
                                <tr role="row">
                                    <th aria-label="Designation : activate to sort column ascending" style="width: 105px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting">Designation </th>
                                    <th aria-sort="Fournisseur " aria-label="Fonction: activate to sort column ascending" style="width: 161px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting_desc">Fournisseur</th>
                                    <th aria-label="Pix d'achat : activate to sort column ascending" style="width: 180px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting">Pix d'achat</th>
                                    <th aria-sort="Prix De Vente" aria-label="Fonction: activate to sort column ascending" style="width: 161px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting_desc">Prix De Vente</th>
                                    <th aria-sort="Date D'achat" aria-label="Fonction: activate to sort column ascending" style="width: 161px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting_desc">Date D'achat</th>
                                    <th aria-sort="Mise A jour Donnee" aria-label="Fonction: activate to sort column ascending" style="width: 161px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting_desc">Mise A jour </th>
                                    <th aria-sort="Supprimer" aria-label="Fonction: activate to sort column ascending" style="width: 161px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting_desc">Supprimer</th>
                                </tr>
                                </thead>
                                <tbody >
                                <?php
                                $i = 1;
                                foreach ($listeproduit as $emplistid) {

                                    ?>
                                    <tr>
                                        <td><a href="<?php echo base_url('GestionProduit/ViewInfProduit/'.$emplistid->idp);  ?>"> <?php echo $emplistid->designation ?> </a></td>
                                        <td><?php echo $emplistid->nom ." ". $emplistid->prenom  ;?>   </td>
                                        <td><?php echo $emplistid->prix_achat ?></td>
                                        <td><?php   echo $emplistid->prixventettc ; ?></td>
                                        <td><?php echo $emplistid->date_creation ?></td>
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

                    <!--user list -->
                </div>
            </div>
        </div>

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







