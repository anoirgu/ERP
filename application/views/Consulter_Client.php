<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('Template/MenueHeader');
$this->load->view('Template/Side_bar');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Consulter client
        </h1>

        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('Dashboard/') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Consulter client </li>
        </ol>
    </section>
    <section class="content">
        <div class="panel">
            <div class="panel-body">
        <div class="box-body">
            <h2>Liste des Clients </h2><br>
            <div class="dataTables_wrapper form-inline dt-bootstrap" >
                <div class="row">
                    <table aria-describedby="example1_info" role="grid" id="example1" class="table results table-bordered table-striped dataTable">
                        <thead>
                        <tr role="row">
                            <th aria-label="Nom Du Client: activate to sort column ascending" style="width: 105px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting">Nom </th>
                            <th aria-label="Prenom Du Client: activate to sort column ascending" style="width: 180px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting">Prenom</th>
                            <th aria-sort="Numero Du Mobile " aria-label="Fonction: activate to sort column ascending" style="width: 161px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting_desc">Numero Mobile</th>
                            <th aria-sort="Raison Social" aria-label="Fonction: activate to sort column ascending" style="width: 161px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting_desc">Raison Social</th>
                            <th aria-sort="Date D'ajout" aria-label="Fonction: activate to sort column ascending" style="width: 161px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting_desc">Date D'ajout</th>
                            <th aria-sort="Mise A jour Donnee" aria-label="Fonction: activate to sort column ascending" style="width: 161px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting_desc">Mise A jour </th>
                        </tr>
                        </thead>
                        <tbody >
                        <?php
                        $i = 1;
                        foreach ($emplist as $emplistid) {

                            ?>
                            <tr>
                                <td><a href="<?php echo base_url('GestionClient/ViewInf/'.$emplistid->id);  ?>"> <?php echo $emplistid->nom ?> </a></td>
                                <td><?php echo $emplistid->prenom  ;?>   </td>
                                <td><?php echo $emplistid->mobile ?></td>
                                <td><?php   echo $emplistid->raisonsocial ; ?></td>
                                <td><?php echo $emplistid->date_creation ?></td>
                                <td>
                                    <a href="<?php echo  base_url('GestionClient/update_client/'.$emplistid->id)?>" > <i
                                            class="fa fa-edit"></i></a></td>
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







