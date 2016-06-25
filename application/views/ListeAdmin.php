<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('Template/MenueHeader');
$this->load->view('Template/Side_bar');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Liste Des Admins
        </h1>

        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('Dashboard/') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Liste Des Admins </li>
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
                                    <th aria-label="Nom D'Utilisateur : activate to sort column ascending" style="width: 105px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting">Nom D'Utilisateur </th>
                                    <th aria-sort="Adresse Mail " aria-label="Fonction: activate to sort column ascending" style="width: 161px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting_desc">Adresse Mail</th>
                                     <th aria-sort="Supprimer" aria-label="Fonction: activate to sort column ascending" style="width: 161px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting_desc">Supprimer</th>
                                </tr>
                                </thead>
                                <tbody >
                                <?php
                                $i = 1;
                                foreach ($listeadmin as $emplistid) {

                                    ?>
                                    <tr>
                                        <td><a href="<?php echo base_url('GestionAdmin/ViewInfAdmin/'.$emplistid->id);  ?>"> <?php echo $emplistid->username ?> </a></td>
                                        <td><?php echo $emplistid->email ;?>   </td>
                                        <td>
                                            <a href="<?php echo base_url('GestionAdmin/delet_Admin/'.$emplistid->id); ?>">
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



