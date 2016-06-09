<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('Template/MenueHeader');
$this->load->view('Template/Side_bar');
?>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Information Sur le Produit <?php  echo $produit[0]->designation;   ?>
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
                            <div class="panel-heading">Information Générale </div>
                            <div class="panel-body">
                                <table>
                                    <tr><td> <h3>  <label >Designation :</label></td><td>  <?php  echo $produit[0]->designation ; ?></h3><br></td></tr>
                                    <tr><td> <h3>  <label >Fournisseur :</label></td><td>  <?php  echo"    ".$produit[0]->nom ;  ?></h3><br></td></tr>
                                    <tr><td> <h3>  <label >Prix Vente :</label> </td><td> <?php  echo $produit[0]->prixventettc ;  ?></h3><br></td></tr>
                                    <tr><td> <h3>  <label >Quantite en stock :</label> </td><td> <?php  echo " ".$produit[0]->quantite ;   ?></h3><br></td></tr>
                                    <tr><td> <h3>  <label >Date D'achat :</label> </td><td> <?php  echo  $produit[0]->date_creation ;   ?></h3><br></td></tr>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="btn-block btn-success" onclick="history.back(-1)">Retour </button>
            </div>
        </section>

    </div>
<?php
$this->load->view('Template/Footer');
?>