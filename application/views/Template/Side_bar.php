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
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search Employee...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
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
                            <li class="<?php if ( $this->uri->uri_string() == 'GestionClient/ajouter'){echo "active";} ?>"><a  href="<?php echo base_url('GestionClient/Ajouter')?>"><i class="fa  fa-user-plus"></i> Ajouter Un Client</a></li>
                            <li class="<?php if ( $this->uri->uri_string() == 'GestionClient/Consulter'){echo "active";} ?>"><a  href="<?php echo site_url('GestionClient/Consulter')?>"><i class="fa fa-eye"></i>Consulter liste des Client</a></li>
                        </ul>
                    </li>
                    <li class="treeview ">
                        <a href="#"><i class="fa fa-circle-o"></i> Gestion Du Stock <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li class="<?php if ( $this->uri->uri_string() == 'GestionProduit/AjouterFournisseur'){echo "active";} ?>"><a  href="<?php echo base_url('GestionProduit/AjouterFournisseur')?>"><i class="fa  fa-user-plus"></i> Ajouter Un Fournisseur</a></li>
                            <li class="<?php if ( $this->uri->uri_string() == 'GestionProduit/ListeFournisseur'){echo "active";} ?>"><a  href="<?php echo base_url('GestionProduit/ListeFournisseur')?>"><i class="fa fa-eye"></i>Liste des Fournisseurs</a></li>


                            <li class="<?php if ( $this->uri->uri_string() == 'GestionProduit/AjouterProduit'){echo "active";} ?>"><a  href="<?php echo base_url('GestionProduit/AjouterProduit')?>"><i class="fa fa-cart-plus"></i> Ajouter Un Produit</a></li>
                            <li class="<?php if ( $this->uri->uri_string() == 'GestionProduit/ListeProduit'){echo "active";} ?>"><a  href="<?php echo site_url('GestionProduit/ListeProduit')?>"><i class="fa fa-eye"></i>liste des Produits</a></li>
                        </ul>
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

