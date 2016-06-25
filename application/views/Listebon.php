<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('Template/MenueHeader');
$this->load->view('Template/Side_bar');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Liste Des Bons De Livraison
        </h1>

        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('Dashboard/') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Liste Des Bon De  Livraison </li>
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
                                    <th aria-label="Numero Du Bon  : activate to sort column ascending" style="width: 105px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting">Numero Du Bon</th>
                                    <th aria-label="Client : activate to sort column ascending" style="width: 180px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting">Client</th>
                                    <th aria-sort="Imprimer " aria-label="Fonction: activate to sort column ascending" style="width: 161px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting_desc">Imprimer</th>
                                    <?php if($_SESSION['isSysAdmin']==1){ ?>   <th aria-sort="Supprimer" aria-label="Fonction: activate to sort column ascending" style="width: 161px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting_desc">Supprimer</th>
                                    <?php }?> </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($listebon as $listebon){ ?>
                                <tr>
                                <td><a href="<?php echo base_url('Bonlivraison/AficherBon/'.$listebon->numerobonliv ) ; ?>"> <?php echo $listebon->numerobonliv ?></a> </td>
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







