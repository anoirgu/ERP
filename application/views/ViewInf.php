<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('Template/MenueHeader');
$this->load->view('Template/Side_bar');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Information Sur le client  <?php  echo $client[0]->nom." ".$client[0]->prenom ;   ?>
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
                     <h2>  <label class="label label-warning">Statut :</label>  <?php  echo"  ".$client[0]->statut;  ?></h2><br>
                     <h2>  <label class="label label-warning">Nom :</label>  <?php  echo $client[0]->civilite."  ".$client[0]->nom." ".$client[0]->prenom ;   ?></h2><br>
                     <h2>  <label class="label label-warning">Adresse :</label>  <?php  echo"  ".$client[0]->adresse." , ".$client[0]->pays." ".$client[0]->ville." ".$client[0]->code_postal ;   ?></h2><br>
                     <h2>  <label class="label label-warning">Contact :</label>  <?php  echo" Telephone Fix :  ".$client[0]->telephone." , Mobile : ".$client[0]->mobile ;   ?></h2><br>
                     <h2>  <label class="label label-warning">Email :</label>  <?php  echo"  ".$client[0]->email  ;  ?></h2><br>
                     <h2>  <label class="label label-warning">Activite :</label>  <?php  echo"  ".$client[0]->activite  ;  ?></h2><br>
                 </div>
                     </div>
         </div>
   </div>
         <div class="row">
             <div class="col-lg-12">
                 <div class="panel panel-default">
                     <div class="panel-heading">Adresse De Livraison  </div>
                     <div class="panel-body">
                         <h2>  <label class="label label-warning">Raison Social :</label>  <?php  echo"  ".$livraison[0]->raisonsocial;?></h2><br>
                         <h2>  <label class="label label-warning">Adresse  :</label>  <?php  echo"  ".$livraison[0]->adresse."  ,".$livraison[0]->pays."  ,".$livraison[0]->ville."  ,".$livraison[0]->code_postal ;?></h2><br>



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