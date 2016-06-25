<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('Template/MenueHeader');
$this->load->view('Template/Side_bar');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Information Sur le travaile du  :  <?php echo $admininf[0]->username ;  ?>
        </h1>

        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('Dashboard/') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">information sur admin </li>
        </ol>
    </section>
    <section class="content">
        <div class="panel">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Information Sur L'admin  </div>
                        <div class="panel-body">
                            <h3>  <label >Nom  :</label>   <?php echo $admininf[0]->username ;  ?></h3>
                                <h3>  <label >Email :</label>  <?php echo $admininf[0]->email ;  ?> </h3>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="panel">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Liste Des Bon Livraisons Effectuer  </div>
                        <div class="panel-body">
                            <div class="box-body">
                                <div class="dataTables_wrapper form-inline dt-bootstrap" >
                                    <div class="row">
                                        <table aria-describedby="example1_info" role="grid" id="example1" class="table results table-bordered table-striped dataTable">
                                            <thead>
                                            <tr role="row">
                                                <th aria-label="Numero Du Bon  : activate to sort column ascending" style="width: 105px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting">Numero Du Bon</th>
                                                <th aria-label="Date Du Bon  : activate to sort column ascending" style="width: 105px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting">Date  Du Bon</th>
                                                <th aria-label="Client : activate to sort column ascending" style="width: 180px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting">Client</th>
                                                <th aria-sort="Imprimer " aria-label="Fonction: activate to sort column ascending" style="width: 161px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting_desc">Imprimer</th>
                                                <?php if($_SESSION['isSysAdmin']==1){ ?>   <th aria-sort="Supprimer" aria-label="Fonction: activate to sort column ascending" style="width: 161px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting_desc">Supprimer</th>
                                                <?php }?> </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($listebon as $listebon){ ?>
                                                <tr>
                                                    <td><a href="<?php echo base_url('Bonlivraison/AficherBon/'.$listebon->numerobonliv ) ; ?>"> <?php echo $listebon->numerobonliv ?></a> </td>
                                                    <td><?php echo $listebon->datebon ;?></td>
                                                    <td><?php echo $listebon->nom." ".$listebon->prenom ;?></td>
                                                    <td> <a href="<?php echo base_url('Bonlivraison/Imprimer/'.$listebon->numerobonliv); ?>">
                                                            <i class="fa fa-print"></i></a>  </td>
                                                    <?php if($_SESSION['isSysAdmin']==1){ ?>  <td> <a href="<?php echo base_url('Bonlivraison/suprimerbon/'.$listebon->numerobonliv); ?>">
                                                            <i class="fa fa-trash-o"></i></a></td>
                                                    <?php }?>


                                                </tr>
                                            <?php } ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!--user list -->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Liste Des Devis Effectuer </div>
                        <div class="panel-body">
                            <div class="box-body">
                                <div class="dataTables_wrapper form-inline dt-bootstrap" >
                                    <div class="row">
                                        <table aria-describedby="example1_info" role="grid" id="example2" class="table results table-bordered table-striped dataTable">
                                            <thead>
                                            <tr role="row">
                                                <th aria-label="Numero Du Devis  : activate to sort column ascending" style="width: 105px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting">Numero Du Devis</th>
                                                <th aria-label="Date Du Devis  : activate to sort column ascending" style="width: 105px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting">Date Du Devis</th>
                                                <th aria-label="Client : activate to sort column ascending" style="width: 180px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting">Client</th>
                                                <th aria-sort="Imprimer " aria-label="Fonction: activate to sort column ascending" style="width: 161px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting_desc">Imprimer</th>
                                                <?php if($_SESSION['isSysAdmin']==1){ ?>   <th aria-sort="Supprimer" aria-label="Fonction: activate to sort column ascending" style="width: 161px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting_desc">Supprimer</th>
                                                <?php }?>  </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($listDevis as $listebon){ ?>
                                                <tr>
                                                    <td><a href="<?php echo base_url('Devis/AficherDevis/'.$listebon->numerodevis ) ; ?>"> <?php echo $listebon->numerodevis ?></a> </td>
                                                    <td><?php echo $listebon->datedevis;?></td>
                                                    <td><?php echo $listebon->nom." ".$listebon->prenom ;?></td>
                                                    <td> <a href="<?php echo base_url('Devis/Imprimer/'.$listebon->numerodevis); ?>">
                                                            <i class="fa fa-print"></i></a>  </td>
                                                    <?php if($_SESSION['isSysAdmin']==1){ ?>    <td> <a href="<?php echo base_url('Devis/suprimerDevis/'.$listebon->numerodevis); ?>">
                                                            <i class="fa fa-trash-o"></i></a></td>
                                                    <?php }?>

                                                </tr>
                                            <?php } ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!--user list -->
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Liste Des Factures Effectuer </div>
                        <div class="panel-body">

                            <div class="box-body">
                                <div class="dataTables_wrapper form-inline dt-bootstrap" >
                                    <div class="row">
                                        <table aria-describedby="example1_info" role="grid" id="example3" class="table results table-bordered table-striped dataTable">
                                            <thead>
                                            <tr role="row">
                                                <th aria-label="Numero Du Facture  : activate to sort column ascending" style="width: 105px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting">Numero Du Facture</th>
                                                <th aria-label="Date Du Facture  : activate to sort column ascending" style="width: 105px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting">Date Du Facture</th>
                                                <th aria-label="Client : activate to sort column ascending" style="width: 180px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting">Client</th>
                                                <th aria-sort="Imprimer " aria-label="Fonction: activate to sort column ascending" style="width: 161px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting_desc">Imprimer</th>
                                                <?php if($_SESSION['isSysAdmin']==1){ ?>     <th aria-sort="Supprimer" aria-label="Fonction: activate to sort column ascending" style="width: 161px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting_desc">Supprimer</th>
                                                <?php }?>  </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($listfacture as $listebon){ ?>
                                                <tr>
                                                    <td><a href="<?php echo base_url('Facture/AficherFacture/'.$listebon->numerofacture ) ; ?>"> <?php echo $listebon->numerofacture?></a> </td>
                                                    <td><?php echo $listebon->datefacture ;?></td>
                                                    <td><?php echo $listebon->nom." ".$listebon->prenom ;?></td>
                                                    <td> <a href="<?php echo base_url('Facture/Imprimer/'.$listebon->numerofacture); ?>">
                                                            <i class="fa fa-print"></i></a>  </td>
                                                    <?php if($_SESSION['isSysAdmin']==1){ ?>      <td> <a href="<?php echo base_url('Facture/suprimerFacture/'.$listebon->numerofacture); ?>">
                                                            <i class="fa fa-trash-o"></i></a></td>
                                                    <?php }?>
                                                </tr>
                                            <?php } ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!--user list -->
                            </div>
                            <button class="btn-block btn-success" onclick="history.back(-1)">Retour </button>
                        </div>
                    </div>
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
        $(function () {
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
        $(function () {
            $('#example3').DataTable({
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

