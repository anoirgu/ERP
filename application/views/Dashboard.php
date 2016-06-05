<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('Template/MenueHeader');
$this->load->view('Template/Side_bar');
?>
<div style="min-height: 862px;" class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Accueil</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <section class="content">

        <div class="row">
            <div class="col-lg-1 col-xs-6"></div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo $numberClient ;  ?></h3>

                        <p>Clients</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="<?php echo base_url('GestionClient/Consulter') ?>" class="small-box-footer">Plus Information<i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo $numberFourni ;  ?></h3>

                        <p>Fournisseurs</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="<?php echo base_url('GestionProduit/ListeFournisseur') ?>" class="small-box-footer">Plus Information  <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?php echo $numberProduit ;  ?></h3>

                        <p>Produit</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="<?php echo base_url('GestionProduit/ListeProduit');?>" class="small-box-footer">Plus Information <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-1 col-xs-6"></div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">

                    <div class="inner">
                        <h3></h3>

                       <p>Bon De Livraison </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-add"></i>
                    </div>
                    <a href="<?php echo base_url('Bonlivraison/Ajouter') ?>" class="small-box-footer">Ajouter Bon de Livraison<i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">

                    <div class="inner">
                        <h3></h3>

                        <p>Devis </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">Ajouter Un Devis<i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">

                    <div class="inner">
                        <h3></h3>

                        <p> J'ai oublier</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">Ajouter ..........<i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
 </div>



    </section>
    </div>
<?php
$this->load->view('Template/Footer');
?>


