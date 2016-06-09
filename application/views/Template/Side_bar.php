<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url();?>/assets/img/avatar5.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Admin</p>
                <a href="#"><i class="fa fa-circle text-success"></i> En ligne</a>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="header">ERP </li>
            <li class="treeview active">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Menu</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if ( $this->uri->uri_string() == 'EntrepriseSetting'){echo "active";} ?>"> <a href="<?php echo base_url('EntrepriseSetting')?>" ><i class="fa fa-info-circle"></i>Information du Societe</a></li>
                    <li class="treeview ">
                        <a href="#"><i class="fa  fa-user"></i> Gestion Du Client <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li class="<?php if ( $this->uri->uri_string() == 'GestionClient/Ajouter'){echo "active";} ?>"><a  href="<?php echo base_url('GestionClient/Ajouter')?>"><i class="fa  fa-user-plus"></i> Ajouter Un Client</a></li>
                            <li class="<?php if ( $this->uri->uri_string() == 'GestionClient/Consulter'){echo "active";} ?>"><a  href="<?php echo site_url('GestionClient/Consulter')?>"><i class="fa fa-eye"></i>Consulter liste des Client</a></li>
                        </ul>
                    </li>
                    <li class="treeview ">
                        <a href="#"><i class="fa fa-archive"></i> Gestion Du Stock <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li class="<?php if ( $this->uri->uri_string() == 'GestionProduit/AjouterFournisseur'){echo "active";} ?>"><a  href="<?php echo base_url('GestionProduit/AjouterFournisseur')?>"><i class="fa  fa-user-plus"></i> Ajouter Un Fournisseur</a></li>
                            <li class="<?php if ( $this->uri->uri_string() == 'GestionProduit/ListeFournisseur'){echo "active";} ?>"><a  href="<?php echo base_url('GestionProduit/ListeFournisseur')?>"><i class="fa fa-eye"></i>Liste des Fournisseurs</a></li>
                            <li class="<?php if ( $this->uri->uri_string() == 'GestionProduit/AjouterProduit'){echo "active";} ?>"><a  href="<?php echo base_url('GestionProduit/AjouterProduit')?>"><i class="fa fa-cart-plus"></i> Ajouter Un Produit</a></li>
                            <li class="<?php if ( $this->uri->uri_string() == 'GestionProduit/ListeProduit'){echo "active";} ?>"><a  href="<?php echo site_url('GestionProduit/ListeProduit')?>"><i class="fa fa-eye"></i>liste des Produits</a></li>
                        </ul>
                    </li>
                    <li class="treeview ">
                        <a href="#"><i class="fa   fa-file"></i> Gestion Bon Livraison <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li class="<?php if ( $this->uri->uri_string() == 'Bonlivraison/Ajouter'){echo "active";} ?>"><a  href="<?php echo base_url('Bonlivraison/Ajouter')?>"><i class="fa  fa-user-plus"></i> Ajouter Bon Livraison</a></li>
                            <li class="<?php if ( $this->uri->uri_string() == 'Bonlivraison/Listebon'){echo "active";} ?>"><a  href="<?php echo site_url('Bonlivraison/Listebon')?>"><i class="fa fa-eye"></i>liste des Bon De Livraison  </a></li>
                        </ul>
                    </li>
                    <li class="treeview ">
                        <a href="#"><i class="fa   fa-file"></i> Gestion Des Devis <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li class="<?php if ( $this->uri->uri_string() == 'Devis/AjouterDevis'){echo "active";} ?>"><a  href="<?php echo base_url('Devis/AjouterDevis')?>"><i class="fa  fa-user-plus"></i> Ajouter Devis</a></li>
                            <li class="<?php if ( $this->uri->uri_string() == 'Devis/ConsulterDevis'){echo "active";} ?>"><a  href="<?php echo site_url('Devis/ConsulterDevis')?>"><i class="fa fa-eye"></i>liste des Devis  </a></li>
                        </ul>
                    </li>
                    <li class="treeview ">
                        <a href="#"><i class="fa   fa-file"></i> Gestion Des Factures <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li class="<?php if ( $this->uri->uri_string() == 'Facture/AjouterFacture'){echo "active";} ?>"><a  href="<?php echo base_url('Facture/AjouterFacture')?>"><i class="fa  fa-user-plus"></i> Ajouter Facture</a></li>
                            <li class="<?php if ( $this->uri->uri_string() == 'Facture/ConsulterFacture'){echo "active";} ?>"><a  href="<?php echo site_url('Facture/ConsulterFacture')?>"><i class="fa fa-eye"></i>liste des Factures  </a></li>
                        </ul>
                    </li>

                    <li class="<?php if ( $this->uri->uri_string() == 'Dashboard/Setting'){echo "active";} ?>"><a  href="<?php echo site_url('Dashboard/Setting')?>"><i class="fa fa-gears"></i>Configuration</a></li>

                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<script>
    $(function(){
        $('.sidebar-menu .treeview').on('click', function () {
            $('.treeview').removeClass('active');
            $(this).addClass('active');
        });
    });
</script>

