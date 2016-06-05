<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('Template/MenueHeader');
$this->load->view('Template/Side_bar');
?>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Information Sur le Bon De Livraison   <?php  echo $produitbon[0]->numerobonlivraison  ;   ?>
            </h1>

            <ol class="breadcrumb">
                <li><a href="<?php echo site_url('Dashboard/') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Information client </li>
            </ol>
        </section>
        <section class="content">
            <div class="panel">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Information Sur Le Client </div>
                            <div class="panel-body">
                                <table>

                                    <tr><td> <h3>  <label class="label label-success">Statut :</label> </td> <td> <?php  echo"    ".$clienbon[0]->statut;  ?></h3><br></td></tr>
                                    <tr><td> <h3>  <label class="label label-success">Nom :</label></td><td>  <?php  echo $clienbon[0]->civilite."  ".$clienbon[0]->nom." ".$clienbon[0]->prenom ;   ?></h3><br></td></tr>
                                    <tr><td> <h3>  <label class="label label-success">Raison Social :</label></td><td>  <?php  echo"    ".$clienbon[0]->raisonsocial  ;  ?></h3><br></td></tr>
                                    <tr><td> <h3>  <label class="label label-success">Adresse :</label> </td><td> <?php  echo"    ".$clienbon[0]->adresse." , ".$clienbon[0]->pays." ".$clienbon[0]->ville." ".$clienbon[0]->code_postal ;   ?></h3><br></td></tr>
                                    <tr><td> <h3>  <label class="label label-success">Contact :</label> </td><td> <?php  echo"   Telephone Fix :  ".$clienbon[0]->telephone." , Mobile : ".$clienbon[0]->mobile ;   ?></h3><br></td></tr>
                                    <tr><td> <h3>  <label class="label label-success">Email :</label> </td><td> <?php  echo"    ".$clienbon[0]->email  ;  ?></h3><br></td></tr>
                                    <tr><td> <h3>  <label class="label label-success">Activite :</label> </td><td> <?php  echo"    ".$clienbon[0]->activite  ;  ?></h3><br></td></tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Liste Des Produits  </div>
                            <div class="panel-body">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Designation </th>
                                        <th>Prix De Vente</th>
                                        <th>TVA </th>
                                        <th>Quantite</th>
                                        <th>Prix TTC</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $pritventtotal =0;
                                    $pritttotal= 0 ;
                                    foreach ($produitbon as $produitbon){ ?>
                                    <tr>

                                         <td><?php  echo $produitbon->designation; ?></td>
                                        <td> <?php  echo $produitbon->prixvente; ?></td>
                                        <td> <?php  echo $produitbon->tva; ?></td>
                                        <td> <?php  echo $produitbon->quantite; ?></td>
                                        <td> <?php  echo $produitbon->prixvente*$produitbon->tva; ?></td>
                                        </tr>
                                     <?php       $pritventtotal+=$produitbon->prixvente*$produitbon->quantite  ;
                                        $pritttotal+=$produitbon->prixvente*$produitbon->tva*$produitbon->quantite;

                                    }?>
                                    <tr>
                                        <td></td>
                                        <td><h3> Total :<?php echo $pritventtotal; ?></h3></td>
                                        <td> </td>
                                        <td></td>
                                        <td><h3>Total :  <?php echo $pritttotal; ?></h3></td>
                                    </tr>
                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>
                </div>
                <center><a class="btn btn-primary btn-lg" href="<?php echo base_url('Bonlivraison/Imprimer/'.$produitbon->numerobonlivraison) ?>" >Imprimer </a></center>
               <br> <button class="btn-block btn-success" onclick="history.back(-1)">Retour </button>
            </div>
        </section>

    </div>
<?php
$this->load->view('Template/Footer');
?>