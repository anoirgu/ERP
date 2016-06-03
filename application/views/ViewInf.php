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
                         <table>

                    <tr><td> <h3>  <label class="label label-success">Statut :</label> </td> <td> <?php  echo"    ".$client[0]->statut;  ?></h3><br></td></tr>
                             <tr><td> <h3>  <label class="label label-success">Nom :</label></td><td>  <?php  echo $client[0]->civilite."  ".$client[0]->nom." ".$client[0]->prenom ;   ?></h3><br></td></tr>
                             <tr><td> <h3>  <label class="label label-success">Raison Social :</label></td><td>  <?php  echo"    ".$client[0]->raisonsocial  ;  ?></h3><br></td></tr>
                             <tr><td> <h3>  <label class="label label-success">Adresse :</label> </td><td> <?php  echo"    ".$client[0]->adresse." , ".$client[0]->pays." ".$client[0]->ville." ".$client[0]->code_postal ;   ?></h3><br></td></tr>
                             <tr><td> <h3>  <label class="label label-success">Contact :</label> </td><td> <?php  echo"   Telephone Fix :  ".$client[0]->telephone." , Mobile : ".$client[0]->mobile ;   ?></h3><br></td></tr>
                             <tr><td> <h3>  <label class="label label-success">Email :</label> </td><td> <?php  echo"    ".$client[0]->email  ;  ?></h3><br></td></tr>
                             <tr><td> <h3>  <label class="label label-success">Activite :</label> </td><td> <?php  echo"    ".$client[0]->activite  ;  ?></h3><br></td></tr>
                         </table>
                     </div>
                     </div>
         </div>
   </div>
         <div class="row">
             <div class="col-lg-12">
                 <div class="panel panel-default">
                     <div class="panel-heading">Adresse De Livraison  </div>
                     <div class="panel-body">
                         <h3>  <label class="label label-success">Adresse  :</label>  <?php  echo"  ".$livraison[0]->adresse."  ,".$livraison[0]->pays."  ,".$livraison[0]->ville."  ,".$livraison[0]->code_postal ;?></h3><br>



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