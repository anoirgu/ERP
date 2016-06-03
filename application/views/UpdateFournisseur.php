<?php
$this->load->view('Template/MenueHeader');
$this->load->view('Template/Side_bar');
?>
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Mise A jour le Fournisseur : <?php echo $fournisseur[0]->nom ." ". $fournisseur[0]->prenom ;  ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('Dashboard/') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Mise A jour Du Fournisseur</li>
        </ol>
    </section>
    <hr>
    <section class="content">
        <link rel="stylesheet"
              href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
        <link rel="stylesheet"
              href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap-theme.min.css">
        <script src="http://code.jquery.com/jquery.min.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
        <style>



            .media {
                /*box-shadow:0px 0px 4px -2px #000;*/
                margin: 20px 0;
                padding: 30px;
            }
            .dp {
                border: 10px solid #eee;
                transition: all 0.2s ease-in-out;
            }
            .dp:hover {
                border: 2px solid #eee;
                transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                -webkit-transform: rotate(360deg);
                /*-webkit-font-smoothing:antialiased;*/
            }
            #custom-search-input {
                padding: 3px;
                border: solid 1px #E4E4E4;
                border-radius: 6px;
                background-color: #fff;
            }
            #custom-search-input input {
                border: 0;
                box-shadow: none;
            }
            #custom-search-input button {
                margin: 2px 0 0 0;
                background: none;
                box-shadow: none;
                border: 0;
                color: #666666;
                padding: 0 8px 0 10px;
                border-left: solid 1px #ccc;
            }
            #custom-search-input button:hover {
                border: 0;
                box-shadow: none;
                border-left: solid 1px #ccc;
            }
            #custom-search-input .glyphicon-search {
                font-size: 23px;
            }


            .stepwizard-step p {
                margin-top: 10px;
            }
            .stepwizard-row {
                display: table-row;
            }
            .stepwizard {
                display: table;
                width: 50%;
                position: relative;
            }
            .stepwizard-step button[disabled] {
                opacity: 1 !important;
                filter: alpha(opacity=100) !important;
            }
            .stepwizard-row:before {
                top: 14px;
                bottom: 0;
                position: absolute;
                content: " ";
                width: 100%;
                height: 1px;
                background-color: #ccc;
                z-order: 0;
            }
            .stepwizard-step {
                display: table-cell;
                text-align: center;
                position: relative;
            }
            .btn-circle {
                width: 30px;
                height: 30px;
                text-align: center;
                padding: 6px 0;
                font-size: 12px;
                line-height: 1.428571429;
                border-radius: 15px;
            }


            .entry:not(:first-of-type)
            {
                margin-top: 10px;
            }

            .glyphicon
            {
                font-size: 12px;
            }

            td {
                padding:2px;
            }
        </style>
        <script>
            $(document).ready(function () {
                $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                    var currentTab = $(e.target).text(); // get current tab
                    var LastTab = $(e.relatedTarget).text(); // get last tab
                    $(".current-tab span").html(currentTab);
                    $(".last-tab span").html(LastTab);
                });
            });

            $(document).ready(function () {
                var navListItems = $('div.setup-panel div a'),
                    allWells = $('.setup-content'),
                    allNextBtn = $('.nextBtn');

                allWells.hide();

                navListItems.click(function (e) {
                    e.preventDefault();
                    var $target = $($(this).attr('href')),
                        $item = $(this);

                    if (!$item.hasClass('disabled')) {
                        navListItems.removeClass('btn-primary').addClass('btn-default');
                        $item.addClass('btn-primary');
                        allWells.hide();
                        $target.show();
                        $target.find('input:eq(0)').focus();
                    }
                });

                allNextBtn.click(function(){
                    var curStep = $(this).closest(".setup-content"),
                        curStepBtn = curStep.attr("id"),
                        nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                        curInputs = curStep.find("input[type='text'],input[type='url']"),
                        isValid = true;

                    $(".form-group").removeClass("has-error");
                    for(var i=0; i<curInputs.length; i++){
                        if (!curInputs[i].validity.valid){
                            isValid = false;
                            $(curInputs[i]).closest(".form-group").addClass("has-error");
                        }
                    }

                    if (isValid)
                        nextStepWizard.removeAttr('disabled').trigger('click');
                });

                $('div.setup-panel div a.btn-primary').trigger('click');
            });



            $(function()
            {
                $(document).on('click', '.btn-add', function(e)
                {
                    e.preventDefault();

                    var controlForm = $(this).closest('table'),
                        currentEntry = $(this).parents('tr:first'),
                        newEntry = $(currentEntry.clone()).appendTo(controlForm);

                    newEntry.find('input').val('');
                    controlForm.find('tr:not(:last) .btn-add')
                        .removeClass('btn-add').addClass('btn-remove')
                        .removeClass('btn-success').addClass('btn-danger')
                        .html('<span class="glyphicon glyphicon-minus gs"></span>');
                }).on('click', '.btn-remove', function(e)
                {
                    $(this).parents('tr:first').remove();

                    e.preventDefault();
                    return false;
                });
            });
        </script>
        <style>
            .DemoBS3 {
                margin: 40px;
            }
        </style>
        <div class="panel ">
            <div class="DemoBS3">

                <!--registration form -->

                <div class="container">

                    <div class="stepwizard col-md-offset-2">
                        <div class="stepwizard-row setup-panel">
                            <div class="stepwizard-step">
                                <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>

                            </div>
                            <div class="stepwizard-step">
                                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>

                            </div>
                        </div>
                    </div>



                    <div class="row setup-content" id="step-1">
                        <div class="col-xs-6 col-md-offset-2">
                            <?php if (validation_errors()) : ?>
                                <div class="col-md-12">
                                    <div class="alert alert-danger" role="alert">
                                        <?= validation_errors() ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if (isset($error)) : ?>
                                <div class="col-lg-12">
                                    <div class="alert alert-succes" role="alert">
                                        <?= $error ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php echo form_open('GestionProduit/miseajour_Fournisseur') ?>
                            <div class="col-md-12">
                                <br>
                                <div class="form-group">
                                    <label class="control-label">Nom</label>
                                    <input maxlength="100" type="text" required="required" class="form-control" value="<?php echo $fournisseur[0]->nom ;  ?>" name="nom"/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Prenom</label>
                                    <input maxlength="100" type="text" required="required" class="form-control" value="<?php echo $fournisseur[0]->prenom ;  ?>" name="prenom"/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Raison Social </label>
                                    <input  required="required" maxlength="100" type="text" class="form-control" value="<?php echo $fournisseur[0]->raisonsocial ;  ?>"  name="raisonsocial" />
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Email</label>
                                    <input required="required" maxlength="100" type="email" class="form-control" value="<?php echo $fournisseur[0]->email ;  ?>" name="email"/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Numero Du Telephone Fixe</label>
                                    <input  required="required" maxlength="100" type="number" class="form-control" value="<?php echo $fournisseur[0]->telephone ;  ?>"  name="phone" />
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Numero Du Telephone Mobile </label>
                                    <input required="required" maxlength="100" type="number" class="form-control" value="<?php echo $fournisseur[0]->mobile ;  ?>"  name="phoneMobile" />
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Numero Du Fax </label>
                                    <input required="required"  maxlength="100" type="number" class="form-control" value="<?php echo $fournisseur[0]->fax ;  ?>" name="fax" />
                                </div>

                                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                            </div>
                        </div>
                    </div>
                    <div class="row setup-content" id="step-2">
                        <div class="col-xs-6 col-md-offset-2">
                            <div class="col-md-12">
                                <h3> Adresse Du Fournisseur </h3><br>
                                <div class="form-group">
                                    <label class="control-label">Adresse</label>
                                    <input  required="required" maxlength="100" type="text" class="form-control" value="<?php echo $fournisseur[0]->adresse ;  ?>"  name="adress" />
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Pays</label>
                                    <input required="required" maxlength="100" type="text" class="form-control" value="<?php echo $fournisseur[0]->pays ;  ?>"  name="pays" />
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Ville</label>
                                    <input required="required" maxlength="100" type="text" class="form-control" value="<?php echo $fournisseur[0]->ville ;  ?>"  name="ville" />
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Code Postal</label>
                                    <input required="required"  maxlength="100" type="number" class="form-control" value="<?php echo $fournisseur[0]->code_postal ;  ?>"  name="codePostal" />
                                </div>

                            </div>
                            <button class="btn btn-success btn-lg pull-right" type="submit">Mise A jour</button>
                        </div>
                    </div>


                </div>

                <?php echo form_close(); ?>
            </div>
            <!--end redistration-->
        </div>
    </section>
</div>
<?php
$this->load->view('Template/Footer');
?>





