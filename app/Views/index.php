<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>RGEE-CI </title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
        <link rel="icon"  sizes="32x32" href="<?= base_url('assets/img/logo.png') ?>">
        <link rel="icon"  sizes="16x16" href="<?= base_url('assets/img/logo.png') ?>">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet"> 

 
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
 
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

 
        <link href="<?= base_url() ?>assets/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

 
        <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">

     
        <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">

        <style>
            * {
                box-sizing: border-box;
                border-radius: 5px;
            }

            body {
                background-color: #f1f1f1;
            }

            #regForm {
                background-color: #ffffff;
                margin: 70px auto;
                font-family: Raleway;
                padding: 30px;
                width: 70%;
                min-width: 300px;
            }

            h1 {
                text-align: center;  
            }

            input {
                padding: 10px;
                width: 100%;
                font-size: 14px;
                font-family: Raleway;
                border: 1px solid #aaaaaa;
            } 
            input.invalid {
            background-color: #ffdddd;
            } 
            .tab {
                display: none;
            }
            .error-message {
                    color: red;
                    font-size: 0.8em;
                    font-style: italic;
                    margin-top: 4px;
                }
            button {
                background-color: #04AA6D;
                color: #ffffff;
                border: none;
                padding: 10px 20px;
                font-size: 17px;
                font-family: Raleway;
                cursor: pointer;
            }
            .label{
                font-size: 0.8em;
            }

            button:hover {
            opacity: 0.8;
            }

            #prevBtn {
                background-color: #bbbbbb;
            }
 
            .step {
                height: 15px;
                width: 15px;
                margin: 0 2px;
                background-color: #bbbbbb;
                border: none;  
                border-radius: 50%;
                display: inline-block;
                opacity: 0.5;
            }

            .step.active {
                opacity: 1;
            }
 
            .step.finish {
                background-color: #04AA6D;
            }
            </style>
    </head>

    <body> 
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div> 
        <div class="container-fluid fixed-top" style="height: 65px;"> 
            <div class="container px-0">
                <nav class="navbar navbar-light bg-white navbar-expand-xl" style="height: 65px;">
                    <a href="<?= route_to('home') ?>" class="navbar-brand"><img  src="<?= base_url('assets/img/logo_anstat.png') ?>" style="height: 10%;width: 10%;"></a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>

                    <div class="collapse navbar-collapse bg-white "   id="navbarCollapse">
                        <div class="navbar-nav mx-auto">  </div>
                        <div class="d-flex m-3 me-0"> 
                           <img  src="<?= base_url('assets/img/armoirie.png') ?>" style="height: 20%;width: 20%;">
                        </div>
                    </div>
    
                                             
                                       
                    <a href="<?= route_to('logout') ?>"  class="btn btn-primary   blink-border" style="color:#49655A;font-size:10px;height:30px; width: 30%;    background-color:white; border:2px solid #49655A;"> 
                                 Se déconnecter
                            </a>
                          
                </nav>
            </div>
        </div> 
        <div class="container pt-3">  
                <form action="<?= route_to('store.questionnaire'); ?>" method="post" id="regForm" autocomplete="off" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                     <p class="text-center"><a href="<?= route_to('home') ?>"> <img  src="<?= base_url('assets/img/logo.png') ?>" ></a></p>
                    <h2 class="text-center">FORMULAIRE D'ENREGISTREMENT</h2> 
                   
                     
                    <!--  1 OK-->
                    <div class="tab step-tab" id="section1"> 
                            <p style="font-size: x-small;" class="text-warning"> B:  LOCALISATION DE L’ENTREPRISE/ETABLISSEMENT ET MODE D’ADMINISTRATION</p>
                             
                            <div class="row">
                              
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="label">B4: Commune / Ville de l’entreprise </label><span class="text-danger">*</span>
                                        <select class="custom-select form-control" id="B4_1" name="B4_1" required>
                                            <option value="">--Choisir--</option> 
                                             <?php foreach ($sousPrefectures as $sousPrefecture) : ?>
                                               <option value="<?= esc($sousPrefecture['cod_dep'] . '_' . $sousPrefecture['cod_sp']); ?>">
                                                    <?= esc($sousPrefecture['nom_sp']); ?>
                                                </option>

                                            <?php endforeach; ?> 
                                        </select>
                                    </div>
                                </div>
                                 <div class="col-lg-6">
                                    <div class="form-group-sm">
                                        <label class="label">B8: Zone d'implantation de l'entreprise/établissement</label><span class="text-danger">*</span>
                                        <select class="custom-select form-control" id="B8" name="B8" required>
                                            <option value="">--Choisir--</option> 
                                            <option value="1">Zone industrielle</option> 
                                            <option value="2">Marché</option> 
                                            <option value="3">Centre commercial</option> 
                                            <option value="4">Zone portuaire</option> 
                                            <option value="5">Autre zone</option> 
                                        </select>
                                    </div>
                                </div> 
                                <div class="col-lg-12 pt-3"  style="display: none;" id="bloc_B8a">
                                    <div class="form-group-sm">
                                        <label class="label"> B8a: Si votre entreprise/établissement est dans un centre commercial ou dans un marché, zone industrielle veuillez préciser le nom </label> <span class="text-danger">*</span>
                                            <textarea class="form-control" name="B8a" id="B8a" required></textarea>
                                    </div>
                                </div> 
                                <input type="hidden" value="" id="datecollecte_deb" name="datecollecte_deb"> 
                            </div> 
                        <br>
                    </div>

                     <!--  2 OK-->
                    <!-- <div class="tab step-tab" id="section2">
                        <p style="font-size: x-small;" class="text-warning">  LOCALISATION DE L’ENTREPRISE/ETABLISSEMENT ET MODE D’ADMINISTRATION</p>
                        <div class="row"> 
                            <div class="col-lg-6">
                                <div class="form-group-sm">
                                    <label class="label">Zone d'implantation de l'entreprise/établissement</label><span class="text-danger">*</span>
                                    <select class="custom-select form-control" id="B8" name="B8" required>
                                        <option value="">--Choisir--</option> 
                                        <option value="1">Zone industrielle</option> 
                                        <option value="2">Marché</option> 
                                        <option value="3">Centre commercial</option> 
                                        <option value="4">Zone portuaire</option> 
                                        <option value="5">Autre zone</option> 
                                    </select>
                                </div>
                            </div> 
                            <div class="col-lg-12 pt-3"  style="display: none;" id="bloc_B8a">
                                <div class="form-group-sm">
                                    <label class="label">Si votre entreprise/établissement est dans un centre commercial ou dans un marché, zone industrielle veuillez préciser le nom </label> 
                                        <textarea class="form-control" name="B8a" id="B8a" required></textarea>
                                </div>
                            </div>  
                        </div> 
                        <br>
                    </div> -->

                       <!--  2 OK-->
                    <div class="tab step-tab" id="section2">
                        <p style="font-size: x-small;" class="text-warning">B:  LOCALISATION DE L’ENTREPRISE/ETABLISSEMENT ET MODE D’ADMINISTRATION</p>
                        <div class="row"> 
                            <fieldset  style="display: block;" id="bloc_B8b">
                                <legend>B8b: Coordonnées GPS du centre commercial ou du marché ou zone industrielle</legend>
                                <i class="text-danger">« Cliquez sur le bouton "autoriser" pour la récupération automatique des coordonnées GPS de votre entreprise. Assurez-vous d'être présent(e) dans les locaux de votre entreprise. »</i> <button id="btnGPS" class="btn-sm">Autoriser</button>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group-sm">
                                            <label class="label">B8b: Longitude </label> <span class="text-danger">*</span>
                                               <input type="text" class="form-control text-danger" name="B8b_1" id="B8b_1" placeholder="Longitude"   readonly> 
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group-sm">
                                                <label class="label">B8b: Latitude </label> <span class="text-danger">*</span>
                                                <input type="text" class="form-control text-danger" name="B8b_2" id="B8b_2" placeholder="Latitude"  readonly >
                                            </div>
                                        </div>
                                        <div class="mb-2"></div> 
                                        <div class="col-lg-6">
                                            <div class="form-group-sm">
                                                <label class="label">B8b: Précision </label> <span class="text-danger">*</span>
                                                <input type="text" class="form-control text-danger" name="B8b_3" id="B8b_3" placeholder="Précision"  readonly >
                                            </div>
                                        </div>
                                        <div class="col-lg-6" style="display: block;" id="bloc_B8c1">
                                            <div class="form-group-sm">
                                                <label class="text-muted">B8c1: Numéro du bâtiment </label> 
                                                <input type="text" class="form-control" name="B8c1" id="B8c1" placeholder="Numéro du bâtiment"  >
                                            </div>
                                        </div>
                                    </div>
                            </fieldset>

                            
                            <div class="col-lg-6" style="display: block;" id="bloc_B8c2">
                                <div class="form-group-sm">
                                    <label class="label">B8c2: Numéro séquentiel de l’entreprise/établissement dans le bâtiment </label> 
                                    <input type="text" class="form-control" name="B8c2" id="B8c2"   >
                                </div>
                            </div> 
                        </div> 
                        <br>
                    </div>

                    <!--  3 OK-->
                    <div class="tab step-tab" id="section3"> 
                        <p style="font-size: x-small;" class="text-warning">B:   LOCALISATION DE L’ENTREPRISE/ETABLISSEMENT ET MODE D’ADMINISTRATION</p>
                        <fieldset class="row" style="display: none;">
                            <legend>B8c3: Coordonnées GPS de l'entreprise/établissement </legend>
                            <i class="text-danger">« Veuillez autoriser la récupération automatique de vos coordonnées GPS. Assurez-vous d'être bien présent(e) dans les locaux de votre entreprise avant de procéder. » <button id="btnGPS2" class="btn-sm">Autoriser</button></i>
                                <div class="col-lg-6">
                                    <div class="form-group-sm">
                                        <label class="label">B8c3_1: Longitude </label> <span class="text-danger">*</span>
                                        <input type="hidden" class="form-control text-danger" name="B8c3_1" id="B8c3_1" placeholder="Longitude"  readonly >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group-sm">
                                        <label class="label">B8c3_2: Latitude </label> <span class="text-danger">*</span>
                                        <input type="hidden" class="form-control text-danger" name="B8c3_2" id="B8c3_2" placeholder="Latitude" readonly  >
                                    </div>
                                </div>
                                <div class="mb-2"></div> 
                                <div class="col-lg-6">
                                    <div class="form-group-sm">
                                        <label class="label">B8c3_3: Précision </label> <span class="text-danger">*</span>
                                        <input type="hidden" class="form-control text-danger" name="B8c3_3" id="B8c3_3" placeholder="Précision"   readonly >
                                    </div>
                                </div> 
                        </fieldset>
                         <div class="col-lg-6">
                            <div class="form-group-sm">
                                <label class="label">B9: Adresse géographique précise de l’entreprise (quartier, rue, etc.) </label> 
                                <input type="text" class="form-control text-danger" name="B9" id="B9"  placeholder="ex : COCODY DANGA Immeuble Carbone non loin du carrefour « la vie » 4e étage porte B2" required  >
                            </div>
                        </div> 
                        <br>
                    </div>

                     <!--  4 -->
                    <div class="tab step-tab" id="section4">
                         <p style="font-size: x-small;" class="text-warning">B:   LOCALISATION DE L’ENTREPRISE/ETABLISSEMENT ET MODE D’ADMINISTRATION</p>
                            <fieldset class="row">
                                <legend>FILTRE TYPE D’ENTREPRISE : ENTREPRISES FORMELLES ET ENTREPRISES INFORMELLES</legend>
                                    <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <label class="label">F01: Votre entreprise dispose-t-elle d’un numéro de Registre de Commerce ? <span class="text-danger fs-6">*</span> </label> 
                                            <select class="custom-select form-control" id="F01" name="F01" required>
                                                <option value="">--Choisir--</option> 
                                                <option value="1">Oui</option> 
                                                <option value="2">Non</option> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6" style="display: none;" id="bloc_F01a">
                                        <div class="form-group-sm">
                                            <label class="label">F01a: Si oui donnez le numéro du registre de commerce <span class="text-danger fs-6">*</span> </label>
                                            <input type="text" class="form-control" name="F01a" id="F01a"   required>
                                        </div>
                                    </div> 
                                    <div class="mb-2"></div> 
                                    <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <label class="label">F02: Votre entreprise dispose-t-elle d’un numéro de compte contribuable ?  <span class="text-danger fs-6">*</span> </label> 
                                            <select class="custom-select form-control" id="F02" name="F02" required>
                                                <option value="">--Choisir--</option> 
                                                <option value="1">Oui</option>
                                                <option value="2">Non</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6" style="display: none;" id="bloc_F02a">
                                        <div class="form-group-sm">
                                            <label class="label">F02a: Si oui donnez le numéro <span class="text-danger fs-6">*</span></label>
                                            <input type="text" class="form-control" name="F02a" id="F02a" placeholder="ex : 1234567X"  required >
                                        </div>
                                    </div>  
                                    <div class="mb-2"></div> 
                                    <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <label class="label">F03: Votre entreprise tient-elle, une comptabilité formelle écrite ?   <span class="text-danger fs-6">*</span></label> 
                                            <select class="custom-select form-control" id="F03" name="F03" required>
                                                <option value="">--Choisir--</option> 
                                                <option value="1">Oui</option> 
                                                <option value="2">Non</option> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <label class="label">F04: Votre entreprise produit -elle un document comptable en fin d’exercice ?   <span class="text-danger fs-6">*</span></label> 
                                            <select class="custom-select form-control" id="F04" name="F04" required>
                                                <option value="">--Choisir--</option> 
                                                <option value="1">Oui</option> 
                                                <option value="2">Non</option> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-2"></div> 
                                    <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <label class="label">F05: Votre structure est-elle une Organisation Non gouvernemental (ONG), Association ou une Institution sans but lucratif (ONG, Associations etc.)?   <span class="text-danger fs-6">*</span></label> 
                                            <select class="custom-select form-control" id="F05" name="F05" required>
                                                <option value="">--Choisir--</option> 
                                                <option value="1">Oui</option> 
                                                <option value="2">Non</option> 
                                            </select>
                                        </div>
                                    </div>  
                            </fieldset>
                            <br>
                    </div>

                        <!--  5 -->
                    <div class="tab step-tab" id="section5">
                         <p style="font-size: x-small;" class="text-warning">C: IDENTIFICATION DU REPONDANT ET DE L’ENTREPRISE/ L’ETABLISSEMENT</p>
                            <fieldset class="row">
                                <legend>IDENTIFICATION DU REPONDANT</legend>
                                    <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <label class="label">C1: Nom du répondant   </label> <span class="text-danger">*</span>
                                              <input type="text" class="form-control" name="C1" id="C1"   required>
                                        </div>
                                    </div> 
                                    <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <label class="label">C2: Fonction du répondant    </label> <span class="text-danger">*</span>
                                              <input type="text" class="form-control" name="C2" id="C2"   required>
                                        </div>
                                    </div>
                                    <div class="mb-2"></div> 
                                    <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <label class="label">C3.a: Contact 1 du répondant     </label> <span class="text-danger">*</span>
                                              <input type="tel" class="form-control" name="C3a_1" id="C3a_1" placeholder="Ex: 0701020304" pattern="^\d{14}$" maxlength="14" required >
                                        </div>
                                    </div>
                                    <div class="col-lg-6" id="bloc_C3a_2" style="display: none;">
                                        <div class="form-group-sm">
                                            <label class="label">C3.a: Contact 2 du répondant     </label> 
                                              <input type="tel" class="form-control" name="C3a_2" id="C3a_2" placeholder="Ex: 0701020304" pattern="^\d{14}$" maxlength="14"   >
                                        </div>
                                    </div> 
                                    <div class="mb-2"></div> 
                                    <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <label class="label">C3.b: E-mail du répondant   </label><span class="text-danger">*</span>
                                            <input type="email" class="form-control" name="C3a" id="C3a" placeholder="ex : mail@gmail.com"   required>
                                        </div>
                                    </div> 
                                     
                            </fieldset>
                            <br>
                    </div>

                     <!--  6 -->
                    <div class="tab step-tab" id="section6">
                         <p style="font-size: x-small;" class="text-warning">IDENTIFICATION DU REPONDANT ET DE L’ENTREPRISE/ L’ETABLISSEMENT</p>
                            <fieldset class="row">
                                <legend>IDENTIFICATION DE L’ENTREPRISE/ L’ETABLISSEMENT</legend>
                                    <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <label class="label">C4: Dénomination ou Raison sociale de l’entreprise/établissement  <span class="text-danger fs-6">*</span> </label> 
                                              <input type="text" class="form-control" name="C4" id="C4"   required>
                                        </div>
                                    </div> 
                                    <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <label class="label">C5: Sigle de l’entreprise/établissement   <span class="text-danger fs-6">*</span>  </label> 
                                              <input type="text" class="form-control" name="C5" id="C5"   required>
                                              <label for="aucun" class="text-danger">Saisir "AUCUN" si pas de sigle.</label>
                                        </div>
                                    </div>
                                    <div class="mb-2"></div> 
                                    <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <label class="label">C6: Téléphone 1 (s) fixe(s)   <span class="text-danger fs-6">*</span>  </label> 
                                              <input type="tel" class="form-control" name="C6_1" id="C6_1"  placeholder="27-00-00-00-00"   pattern="^\d{14}$"  maxlength="14" required >
                                        </div>
                                    </div>
                                    <div class="col-lg-6" style="display: none;" id="bloc_C6_2">
                                        <div class="form-group-sm">
                                            <label class="label">C7: Téléphone 2 (s) fixe(s)      </label> 
                                              <input type="tel" class="form-control" name="C6_2" id="C6_2" placeholder="27-00-00-00-00"   pattern="^\d{14}$"  maxlength="14">
                                        </div>
                                    </div> 
                                    <div class="mb-2"></div> 
                                    <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <label class="label">C8: E-mail de l’entreprise   <span class="text-danger fs-6">*</span> </label>
                                            <input type="email" class="form-control" name="C8" id="C8" placeholder="ex : mail@gmail.com"  required>
                                        </div>
                                    </div> 
                                     <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <label class="label">C9: Site web de l’entreprise </label> 
                                              <input type="text" class="form-control" name="C9" id="C9"  placeholder="ex : web.com" >
                                        </div>
                                    </div>
                                    <div class="mb-2"></div> 
                                     <div class="col-lg-6">
                                        <label class="label">C10: Date de création : (Mois, Année)  </label> 
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group-sm">
                                                    <label class="label"> Mois <span class="text-danger fs-6">*</span> </label> 
                                                     <select class="custom-select form-control" id="C10m" name="C10m" required>
                                                        <option value="">--Choisir--</option> 
                                                        <option value="01">Janvier</option> 
                                                        <option value="02">Février</option> 
                                                        <option value="03">Mars</option> 
                                                        <option value="04">Avril</option> 
                                                        <option value="05">Mai</option> 
                                                        <option value="06">Juin</option> 
                                                        <option value="07">Juillet</option> 
                                                        <option value="08">Août</option> 
                                                        <option value="09">Septembre</option> 
                                                        <option value="10">Octobre</option> 
                                                        <option value="11">Novembre</option> 
                                                        <option value="12">Décembre</option>  
                                                        <option value="99">Inconnu </option>  
                                                    </select>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group-sm">
                                                    <label class="label"> Année  </label> <span class="text-danger">*</span>
                                                    <input type="number" class="form-control" name="C10a" id="C10a" max="2025"  placeholder="Ex: 2000" required >
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div> 
                                    <div class="col-lg-6">
                                         <label class="label">C11: Date de début d’exploitation: (Mois, Année)   </label> 
                                        <div class="row">
                                            <div class="col-lg-6"> 
                                                 <div class="form-group-sm">
                                                 <label class="label">  Mois   </label> <span class="text-danger">*</span>
                                                  <select class="custom-select form-control" id="C11m" name="C11m" required>
                                                        <option value="">--Choisir--</option> 
                                                        <option value="01">Janvier</option> 
                                                        <option value="02">Février</option> 
                                                        <option value="03">Mars</option> 
                                                        <option value="04">Avril</option> 
                                                        <option value="05">Mai</option> 
                                                        <option value="06">Juin</option> 
                                                        <option value="07">Juillet</option> 
                                                        <option value="08">Août</option> 
                                                        <option value="09">Septembre</option> 
                                                        <option value="10">Octobre</option> 
                                                        <option value="11">Novembre</option> 
                                                        <option value="12">Décembre</option>  
                                                        <option value="99">Inconnu </option>  
                                                    </select>
                                                
                                            </div>
                                            </div>
                                            <div class="col-lg-6"> 
                                                 <div class="form-group-sm"> 
                                                     <label class="label">  Année   </label> <span class="text-danger">*</span>
                                                <input type="number" class="form-control" name="C11a" id="C11a"  max="2025"  placeholder="Ex: 2022" required>
                                            </div>
                                            </div>
                                            
                                        </div>
                                    </div> 
                                    <div class="mb-2"></div> 
                                    <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <label class="label">C12: Quelle est votre activité principale actuelle ?   </label> <span class="text-danger">*</span>
                                              <input type="text" class="form-control" name="C12" id="C12"    required>
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <label class="label">Codification CIAP (réserver à l’ANStat)   </label> 
                                              <input type="text" class="form-control" name="C12a" id="C12a"    >
                                        </div>
                                    </div> -->
                                    <div class="mb-2"></div> 
                                    <div class="col-lg-6">
                                        <div class="form-group-sm">
                                             <label class="label">C12b: Quel est le type d'activité réalisée dans ce local ?    </label> <span class="text-danger">*</span>
                                            <select class="custom-select form-control" id="C12b" name="C12b" required>
                                                <option value="">--Choisir--</option> 
                                                <option value="1">Assurance</option> 
                                                <option value="2">Atelier de couture</option> 
                                                <option value="3">Auto-école</option> 
                                                <option value="4">Banque</option> 
                                                <option value="5">Boulangerie/pâtisserie</option> 
                                                <option value="6">Boutique/Superette</option> 
                                                <option value="7">Clinique/Hôpital</option> 
                                                <option value="8">Coopérative</option> 
                                                <option value="9">Cordonnerie</option> 
                                                <option value="10">Ferronnerie</option> 
                                                <option value="11">Garage</option> 
                                                <option value="12">Grande surface/centre commercial</option> 
                                                <option value="13">Hôtel</option> 
                                                <option value="14">Kiosque à café</option> 
                                                <option value="15">Lavage (voiture, motos)</option> 
                                                <option value="16">Lieu de cultes</option> 
                                                <option value="17">ONG/ Associations</option> 
                                                <option value="18">Dépôt de boisson</option> 
                                                <option value="19">Dépôt de gaz</option> 
                                                <option value="20">Enseignement</option> 
                                                <option value="21">Pharmacie</option> 
                                                <option value="22">Point de LOTTERIE</option> 
                                                <option value="23">Point mobile money</option> 
                                                <option value="24">Poissonnerie</option> 
                                                <option value="25">Pressing</option> 
                                                <option value="26">Restaurant/Bistrot/Bars/Maquis/Cave</option> 
                                                <option value="27">Salon de beauté (coiffure homme et femme)</option> 
                                                <option value="28">Vente sur table/étagère (étale)</option> 
                                                <option value="29">Cabine téléphonique</option> 
                                                <option value="30">Quincaillerie</option> 
                                                <option value="31">Agence de placement</option> 
                                                <option value="32">Service de réparation (téléphone, électroménager)</option> 
                                                <option value="33">Service immobilier</option> 
                                                <option value="34">Vente de pièces détachées (voiture, moto,vélo)</option> 
                                                <option value="35">Station-service</option> 
                                                <option value="36">Boutique de vêtements, sacs et accessoires</option> 
                                                <option value="37">Autre à préciser</option> <!-- //  -->
                                            </select>
                                        </div>
                                    </div>
                                     <div class="col-lg-6" style="display: none;" id="bloc_C12b">
                                        <div class="form-group-sm">
                                                <label class="label">C12b: Autre à préciser </label> <span class="text-danger">*</span>
                                                <input type="text" class="form-control" name="C12b_37" id="C12b_37"  required >
                                        </div>
                                    </div>
                            </fieldset>
                            <br>
                    </div>

                     <!--  7 -->
                    <div class="tab step-tab" id="section7">
                         <p style="font-size: x-small;" class="text-warning">IDENTIFICATION DU REPONDANT ET DE L’ENTREPRISE/ L’ETABLISSEMENT</p>
                            <fieldset class="row">
                                <legend>IDENTIFICATION DE L’ENTREPRISE/ L’ETABLISSEMENT</legend>
                                    <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <label class="label">C13: Avez-vous des activités secondaires ?    </label> <span class="text-danger">*</span>
                                             <select class="custom-select form-control" id="C13" name="C13" required>
                                                <option value="">--Choisir--</option> 
                                                <option value="1">Oui</option> 
                                                <option value="2">Non</option> 
                                            </select>
                                        </div>
                                    </div> 
                                  

                                    <div class="col-12" style="margin-top: 2% ; display: none;" id="bloc_C13a">
                                        <label class="label">C13a: Si oui, lesquelles ?    </label> 
                                        <table class="table table-bordered tabel-left " id="table_C13a">
                                            <thead>
                                                    <tr style="font-size: small;">
                                                        <th style="width: 5%"><i class="fa fa-list-ol" aria-hidden="true"></i></th>
                                                        <th>ACTIVITES SECONDAIRES</th>
                                                        
                                                        <th>
                                                            <p class="btn btn-sm btn-success add_moreC13a rounded-circle" title="Ajouter une activité secondaire" ><i class="fa fa-plus"></i> </p>
                                                        </th>
                                                    </tr>
                                                </thead>
                                            <tbody  class="addMoreC13a" >
                                                <tr>
                                                    <td>1</td>
                                                    <td>
                                                        <input type="text" class="form-control" name="C13a_AS[]" id="C13a_AS" placeholder="Activités secondaire"  >
                                                    </td> 
                                                    <td><a href="#" class="btn btn-sm btn-danger rounded-circle delete" title="Supprimer l'activité secondaire"><i class="fa fa-times"></i> </a> </td>
                                                </tr>
                                                    
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col-lg-6" style="display: block;" id="bloc_C16">
                                        <div class="form-group-sm">
                                            <label class="label">C16: Votre entreprise est-elle déclarée à la CNPS ?       </label> <span class="text-danger">*</span>
                                              <select class="custom-select form-control" id="C16" name="C16" required>
                                                <option value="">--Choisir--</option> 
                                                 <option value="1">Oui</option> 
                                                <option value="2">Non</option> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6" style="display: none;" id="bloc_C19a">
                                        <div class="form-group-sm">
                                            <label class="label">C19a: Si oui donnez le numéro </label> <span class="text-danger">*</span>
                                              <input type="text" class="form-control" name="C19a" id="C19a"  placeholder="Ex: 2434567" required>
                                        </div>
                                    </div> 
                                    <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <label class="label">C17: Quel est l’état d’activité de l'entreprise ? </label><span class="text-danger">*</span>
                                             <select class="custom-select form-control" id="C17" name="C17" required>
                                                <option value="">--Choisir--</option> 
                                                <option value="1">Activité non encore démarrée  </option> 
                                                <option value="2">En activité</option> 
                                                <option value="3">En veille ou en cessation momentanée </option> 
                                                <option value="4">Cessation totale d’activité</option>  
                                            </select>
                                        </div>
                                    </div> 
                                    
                            </fieldset>
                            <br>
                    </div>

                     <!--  8 -->
                    <div class="tab step-tab" id="section8">
                         <p style="font-size: x-small;" class="text-warning">IDENTIFICATION DU REPONDANT ET DE L’ENTREPRISE/ L’ETABLISSEMENT</p>
                         <div class="row">
                                    <div class="col-lg-6" style="display: block;" id="bloc_C18">
                                        <div class="form-group-sm">
                                            <label class="label">C18: Quelle est la forme juridique de votre entreprise ? </label> <span class="text-danger">*</span>
                                              <select class="custom-select form-control" id="C18" name="C18" required>
                                                <option value="">--Choisir--</option> 
                                                <option value="1">Société en Nom collectif</option> 
                                                <option value="2">Société en Commandite simple</option> 
                                                <option value="3">Société en Participations</option> 
                                                <option value="4">Société de fait</option> 
                                                <option value="5">Société à Responsabilité limitée (SARL)  </option> 
                                                <option value="6">Société par Actions simplifiées (SAS)</option> 
                                                <option value="7">Entreprise individuelle (pers. physique)    </option> 
                                                <option value="8">Société anonyme (SA) </option> 
                                                <option value="9">Groupement d'Intérêt économique (GIE)</option> 
                                                <option value="10">Ets public industriel et commercial (EPIC)</option> 
                                                <option value="11">Autre à préciser</option>  
                                            </select>
                                        </div>
                                    </div>
                                     <div class="col-lg-6" style="display: none;" id="bloc_C18_11">
                                        <div class="form-group-sm">
                                                <label class="label">C18: Autre forme juridique de votre entreprise </label> <span class="text-danger">*</span>
                                                <input type="text" class="form-control" name="C18_11" id="C18_11"  required >
                                        </div>
                                    </div>
                                    <div class="col-lg-6" style="display: block;" id="bloc_C19">
                                        <div class="form-group-sm">
                                            <label class="label">C19: Votre entreprise est-elle majoritairement (Plus de 50%) à capitaux  </label> <span class="text-danger">*</span>
                                              <select class="custom-select form-control" id="C19" name="C19" required>
                                                <option value="">--Choisir--</option> 
                                                <option value="1">Public</option> 
                                                <option value="2">Privé national</option> 
                                                <option value="3">Privé étranger</option>  
                                            </select>
                                        </div>
                                    </div>
                                     <div class="mb-2"></div> 
                                    <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <label class="label">C20: Quel est le statut de votre structure ?  </label> <span class="text-danger">*</span>
                                            <select class="custom-select form-control" id="C20" name="C20" required>
                                                <option value="">--Choisir--</option> 
                                                <option value="1">Siège </option> 
                                                <option value="2">Établissement</option> 
                                            </select>
                                        </div>
                                    </div> 
                                    <div class="col-lg-6" style="display: none;" id="bloc_C20a">
                                        <div class="form-group-sm">
                                            <label class="label">C20a: En dehors du siège, Combien d’établissements avez-vous ?   </label> <span class="text-danger">*</span>
                                              <input type="number" class="form-control" name="C20a" id="C20a" max="999"  min="0" required>
                                        </div>
                                    </div> 
                         </div>
                            <div  style="display: none;" id="bloc_C20b"><br>
                                <label class="label">C20b: Si votre entreprise est un établissement, veuillez donner les informations suivantes </label>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <label class="label">Nom ou raison sociale du siège    </label> <span class="text-danger">*</span>
                                                <input type="text" class="form-control" name="C20b_1" id="C20b_1"  required >
                                        </div>
                                    </div> 
                                    <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <label class="label">Adresse géographique   </label> <span class="text-danger">*</span>
                                               <input type="text" class="form-control" name="C20b_2" id="C20b_2"   required>
                                        </div>
                                    </div>
                                    <div class="mb-2"></div> 
                                    <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <label class="label">Ville / Localité      </label> <span class="text-danger">*</span>
                                               <input type="text" class="form-control" name="C20b_3" id="C20b_3"  required >
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <label class="label">Contact</label> <span class="text-danger">*</span>
                                              <input type="text" class="form-control" name="C20b_4" id="C20b_4" placeholder="Ex: 0701020304" pattern="^\d{14}$" maxlength="14" required >
                                        </div>
                                    </div> 
                                </div>
                            </div>

                                        <div class="col-12"  style="display: none;" id="bloc_C20c"> <br>
                                            <label class="label">C20c: Si votre entreprise est un siège, veuillez donner les informations suivantes sur vos établissements  </label> 
                                            <table class="table table-bordered tabel-left " id="table_C20c">
                                                <thead>
                                                    <tr style="font-size: small;">
                                                        <th ><i class="fa fa-list-ol" aria-hidden="true"></i></th>
                                                        <th >Nom ou raison sociale de l’établissement</th>
                                                        <th >Adresse géographique</th>
                                                        <th >Ville / Localité </th>
                                                        <th >Contact</th> 
                                                        <th>
                                                            <p class="btn btn-sm btn-success add_moreC20c rounded-circle" ><i class="fa fa-plus"></i> </p>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="addMoreC20c" >
                                                    <tr>
                                                        <td>1</td>
                                                        <td>
                                                            <input type="text" class="form-control" name="nom_etablissement[]" id="nom_etablissement"   required>
                                                        </td>
                                                        <td>
                                                             <input type="text" class="form-control" name="adresse[]" id="adresse"   required>
                                                        </td>
                                                         <td>
                                                             <input type="text" class="form-control" name="localite[]" id="localite"  required >
                                                        </td>
                                                         <td>
                                                             <input type="text" class="form-control" name="contact[]" id="contact"  placeholder="Ex: 0701020304" pattern="^\d{14}$" maxlength="14"  required>
                                                        </td>
                                                        <td><a href="#" class="btn btn-sm btn-danger rounded-circle delete"><i class="fa fa-times"></i> </a> </td>
                                                    </tr>
                                                     
                                                </tbody>
                                            </table>
                                        </div>
                            <br>
                    </div>

                     <!--  9 -->
                    <div class="tab step-tab" id="section9">
                         <p style="font-size: x-small;" class="text-warning">IDENTIFICATION DU REPONDANT ET DE L’ENTREPRISE/ L’ETABLISSEMENT</p>
                            <fieldset class="row">
                                <legend>C21: CARACTERISTIQUES SOCIO-DEMOGRAPHIQUES DU DIRIGEANT DE L’ENTREPRISE     </legend>
                                    <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <label class="label">Nom et Prénoms du dirigeant ou gestionnaire    </label> <span class="text-danger">*</span>
                                                <input type="text" class="form-control" name="C21" id="C21"   required>
                                        </div>
                                    </div> 
                                    <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <label class="label">Sexe   </label> <span class="text-danger">*</span>
                                            <select class="custom-select form-control" id="C21_1" name="C21_1" required>
                                                <option value="">--Choisir--</option> 
                                                <option value="1">Masculin</option> 
                                                <option value="2">Féminin</option> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-2"></div> 
                                    <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <label class="label">Age   <i class="text-danger">(Minimum 15 ans)</i>    </label> <span class="text-danger">*</span>
                                               <input type="number" class="form-control" name="C21_2" id="C21_2" min="15" max="999" required >
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <label class="label">Qualité</label> <span class="text-danger">*</span>
                                             <select class="custom-select form-control" id="C21_3" name="C21_3" required>
                                                <option value="">--Choisir--</option>  
                                                <option value="1">Président du Conseil d’Administration</option>  
                                                <option value="2">Directeur Général</option>  
                                                <option value="3">Administrateur Général </option>  
                                                <option value="4">Gérant</option>  
                                                <option value="5">Exploitant </option>  
                                                <option value="6">Autre à préciser</option>  
                                                <option value="7">Propriétaire</option>  
                                            </select>
                                        </div>
                                    </div> 
                                    <div class="col-lg-6" style="display: none;" id="bloc_C21_3_6">
                                        <div class="form-group-sm">
                                                <label class="label">Autre Qualité </label> <span class="text-danger">*</span>
                                                <input type="text" class="form-control" name="C21_3_6" id="C21_3_6"  required >
                                        </div>
                                    </div> 
                            </fieldset>
                            <br>
                    </div>

                    <!--  10 -->
                    <div class="tab step-tab" id="section10">
                         <p style="font-size: x-small;" class="text-warning">IDENTIFICATION DU REPONDANT ET DE L’ENTREPRISE/ L’ETABLISSEMENT</p>
                            <fieldset class="row">
                                <legend>C21: CARACTERISTIQUES SOCIO-DEMOGRAPHIQUES DU DIRIGEANT DE L’ENTREPRISE     </legend>
                                   
                                     <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <label class="label">C22: Votre entreprise dispose-t-elle d’une connexion internet ?</label> <span class="text-danger">*</span>
                                             <select class="custom-select form-control" id="C22" name="C22" required>
                                                <option value="">--Choisir--</option>  
                                                <option value="1">Oui</option>  
                                                <option value="2">Non</option>  
                                            </select>
                                        </div>
                                    </div> 
                                    <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <label class="label">C23b: Quel est l’effectif de femmes employé à ce jour ?        </label> 
                                               <input type="number" class="form-control" name="C23b" id="C23b" max="999"  min="0" >
                                        </div>
                                    </div>
                                    <div class="mb-2"></div> 
                                    <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <label class="label">C23c: Quel est l’effectif d’hommes employé à ce jour ?       </label> 
                                               <input type="number" class="form-control" name="C23c" id="C23c"   max="999"  min="0" >
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <label class="label">C23a: Quel est l’effectif total employé à ce jour ?        </label> 
                                               <input type="number" class="form-control" name="C23a" id="C23a"   >
                                        </div>
                                    </div>
                                    <div class="mb-2"></div> 
                                    <div class="col-lg-6" style="display: block;" id="bloc_C24">
                                        <div class="form-group-sm">
                                            <label class="label">C24: A quelle tranche appartient votre chiffre d’affaires en 2024 ? </label> 
                                               <select class="custom-select form-control" id="C24" name="C24" >
                                                <option value="">--Choisir--</option>    
                                                <option value="1">Inférieur ou égal à 30 millions</option>    
                                                <option value="2">Entre 30 millions et 150 millions</option>    
                                                <option value="3">Supérieur à 150 millions et inférieur ou égal à 1 milliard</option>   
                                                <option value="4">Strictement supérieur à 1 milliard</option>   
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <label class="label">C25:  Fréquence, caractéristique de l’activité réalisée ? </label> <span class="text-danger">*</span>
                                               <select class="custom-select form-control" id="C25" name="C25" required>
                                                <option value="">--Choisir--</option>  
                                                <option value="1">Jours ouvrés et/ou ouvrables / Tous les jours - Activité de journée</option>  
                                                <option value="2">Jours ouvrés et/ou ouvrables / Tous les jours - Activité de nuit</option>
                                                <option value="3">Des jours spécifiques en semaine - Activité de journée</option>
                                                <option value="4">Des jours spécifiques en semaine - Activité de nuit</option>
                                                <option value="5">Jour de marché, d’affluence uniquement</option>
                                                <option value="6">Autre à préciser</option>
                                            </select>
                                        </div>
                                    </div> 
                                    <div class="col-lg-6" style="display: none;" id="bloc_C25_6">
                                        <div class="form-group-sm">
                                                <label class="label">Autre Fréquence, caractéristique de l’activité réalisée </label> <span class="text-danger">*</span>
                                                <input type="text" class="form-control" name="C25_6" id="C25_6"  required >
                                        </div>
                                    </div>
                                    <div class="mb-2"></div> 
                                    <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <label class="label">C26: Votre entreprise dispose-t-elle de clients ou fournisseurs hors de la Côte d’Ivoire ?  </label> <span class="text-danger">*</span>
                                             <select class="custom-select form-control" id="C26" name="C26" required>
                                                <option value="">--Choisir--</option>  
                                                <option value="1">Oui</option>  
                                                <option value="2">Non</option>  
                                            </select>
                                        </div>
                                    </div> 

                            </fieldset>
                            <br>
                    </div>

                     <!--  11 -->
                    <div class="tab step-tab" id="section11">
                         <p style="font-size: x-small;" class="text-warning">IDENTIFICATION DU REPONDANT ET DE L’ENTREPRISE/ L’ETABLISSEMENT</p>
                            <fieldset class="row">
                                <legend> E: PRINCIPALES CONTRAINTES ET DISPOSITIFS D’APPUI AUX ENTREPRISES </legend>
                                <p>
                                   E1: Quelles sont les principales contraintes que votre entreprise rencontre dans le cadre votre activité (choix multiples) ? <i class="text-danger"> (Prière de cocher par ordre d’importance)</i>
                                </p>
                                    <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <input type="checkbox" class="form-check-input ordre-check" id="e1a" name="e1[]" value="e1a">
                                            <label class="form-check-label label" for="e1a">E1a: Insuffisance de personnel qualifié</label>
                                        </div>
                                    </div>
                                     <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <input type="checkbox" class="form-check-input ordre-check" id="e1b" name="e1[]" value="e1b">
                                            <label class="form-check-label label" for="e1b">E1b: Coût élevé de la main d'œuvre</label>
                                        </div>
                                    </div>
                                    <div class="mb-2"></div> 
                                    <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <input type="checkbox" class="form-check-input ordre-check" id="e1c" name="e1[]" value="e1c">
                                            <label class="form-check-label label" for="e1c">E1c: Formalités administratives contraignantes</label>
                                        </div>
                                    </div>
                                     <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <input type="checkbox" class="form-check-input ordre-check" id="e1d" name="e1[]" value="e1d">
                                            <label class="form-check-label label" for="e1d">E1d: Taxes, patentes et impôts trop élevés</label>
                                        </div>
                                    </div>
                                    <div class="mb-2"></div> 
                                    <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <input type="checkbox" class="form-check-input ordre-check" id="e1e" name="e1[]" value="e1e">
                                            <label class="form-check-label label" for="e1e">E1e: Coût du transport élevé (FRET)</label>
                                        </div>
                                    </div>
                                     <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <input type="checkbox" class="form-check-input ordre-check" id="e1f" name="e1[]" value="e1f">
                                            <label class="form-check-label label" for="e1f">E1f: Mauvais état des infrastructures routières</label>
                                        </div>
                                    </div>
                                    <div class="mb-2"></div> 
                                    <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <input type="checkbox" class="form-check-input ordre-check" id="e1g" name="e1[]" value="e1g">
                                            <label class="form-check-label label" for="e1g">E1g: Difficultés d'approvisionnement en matières premières et autres intrants (quantité et qualité)</label>
                                        </div>
                                    </div>
                                     <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <input type="checkbox" class="form-check-input ordre-check" id="e1h" name="e1[]" value="e1h">
                                            <label class="form-check-label label" for="e1h">E1h: Lourdeurs des procédures de règlement des contentieux</label>
                                        </div>
                                    </div>
                                    <div class="mb-2"></div> 
                                    <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <input type="checkbox" class="form-check-input ordre-check" id="e1i" name="e1[]" value="e1i">
                                            <label class="form-check-label label" for="e1i">E1i: Difficultés d'écoulement de la production/insuffisance de débouchés</label>
                                        </div>
                                    </div>
                                     <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <input type="checkbox" class="form-check-input ordre-check" id="e1j" name="e1[]" value="e1j">
                                            <label class="form-check-label label" for="e1j">E1j: Manque/ Faible accès aux technologies spécialisées</label>
                                        </div>
                                    </div>
                                                <div class="mb-2"></div> 
                                    <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <input type="checkbox" class="form-check-input ordre-check" id="e1k" name="e1[]" value="e1k">
                                            <label class="form-check-label label" for="e1k">E1k: Manque de machines et pièces de rechange</label>
                                        </div>
                                    </div>
                                     <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <input type="checkbox" class="form-check-input ordre-check" id="e1l" name="e1[]" value="e1l">
                                            <label class="form-check-label label" for="e1l">E1l: Manque d’expertise technique (maintenance machines)</label>
                                        </div>
                                    </div>
                                                <div class="mb-2"></div> 
                                    <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <input type="checkbox" class="form-check-input ordre-check" id="e1m" name="e1[]" value="e1m">
                                            <label class="form-check-label label" for="e1m">E1m: Manque de local adapté/terrain</label>
                                        </div>
                                    </div>
                                     <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <input type="checkbox" class="form-check-input ordre-check" id="e1n" name="e1[]" value="e1n">
                                            <label class="form-check-label label" for="e1n">E1n: Difficultés d'accès à la commande publique</label>
                                        </div>
                                    </div>
                                                <div class="mb-2"></div> 
                                    <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <input type="checkbox" class="form-check-input ordre-check" id="e1o" name="e1[]" value="e1o">
                                            <label class="form-check-label label" for="e1o">E1o: Accès limité aux structures d'appui aux entreprises</label>
                                        </div>
                                    </div>
                                     <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <input type="checkbox" class="form-check-input ordre-check" id="e1p" name="e1[]" value="e1p">
                                            <label class="form-check-label label" for="e1p">E1p: Difficultés d'accès au crédit (Banque et Microfinance)</label>
                                        </div>
                                    </div>
                                                <div class="mb-2"></div> 
                                    <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <input type="checkbox" class="form-check-input ordre-check" id="e1q" name="e1[]" value="e1q">
                                            <label class="form-check-label label" for="e1q">E1q: Difficultés d'approvisionnement en énergie</label>
                                        </div>
                                    </div>
                                     <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <input type="checkbox" class="form-check-input ordre-check" id="e1r" name="e1[]" value="e1r">
                                            <label class="form-check-label label" for="e1r">E1r: Concurrence déloyale</label>
                                        </div>
                                    </div>
                                                <div class="mb-2"></div> 
                                     <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <input type="checkbox" class="form-check-input ordre-check" id="e1s" name="e1[]" value="e1s">
                                            <label class="form-check-label label" for="e1s">E1s: Corruption (racket, pot de vins, etc.)</label>
                                        </div>
                                    </div>
                                     <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <input type="checkbox" class="form-check-input ordre-check" id="e1t" name="e1[]" value="e1t">
                                            <label class="form-check-label label" for="e1t">E1t: Autres à préciser </label>
                                        </div>
                                    </div>
                                                <div class="mb-2"></div> 
                                     <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <input type="checkbox" class="form-check-input ordre-check" id="e1v" name="e1[]" value="e1v">
                                            <label class="form-check-label label" for="e1v">E1v: Besoin de financement</label>
                                        </div>
                                    </div>
                                     <div class="col-lg-6">
                                        <div class="form-group-sm">
                                            <input type="checkbox" class="form-check-input ordre-check" id="e1u" name="e1[]" value="e1u">
                                            <label class="form-check-label label" for="e1u">E1u: Aucune contrainte</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6" style="display: none;" id="bloc_E1t_autre">
                                        <div class="form-group-sm">
                                                <label class="label">Libelle Autres à préciser </label> <span class="text-danger">*</span>
                                                <input type="text" class="form-control" name="E1t_autre" id="E1t_autre"  required >
                                        </div>
                                    </div> 
                                    <input type="hidden" name="ordreE1" id="ordreE1">

                            </fieldset>
                            <br>
                    </div>
                    <!-- 
                    <div   class="tab step-tab" id="section12">
                            <h1 class="text-danger text-center">FIN</h1> 
                            <h4 class="text-center">L'ANStat VOUS REMERCIE POUR VOTRE COLLABORATION !</h4>
                    </div> -->
                    <div class="tab step-tab" id="section12">
                        <input type="hidden" value="" id="datecollecte_fin" name="datecollecte_fin"> 
                        <div class="text-center mt-4">
                            
                            <button type="submit" id="finalSubmit"  class="btn btn-success">
                                Envoyer les données
                            </button>
                        </div>
                        <br>
                        <div id="finQuestion" style="display: none;">
                            <h1 class="text-danger text-center">FIN DU QUESTIONNAIRE</h1>
                            <h4 class="text-center">L'ANStat VOUS REMERCIE POUR VOTRE COLLABORATION !</h4> 
                        </div>
                        <div id="formResponse" class="mt-3 text-center" style="font-size: large;"></div>
                         <button type="button" id="downloadPDF" class="btn btn-warning" style="display: none;">
                                Télécharger mes réponses
                            </button>
                    </div>
                    <div id="ec-modal-loading" class="ec-modal-loading text-center" style="display: none;">
                        <div class="ec-modal-loading-inner">
                            <div class="ec-modal-loading-msg">
                                <span>CHARGEMENT DES DONNEES...</span>
                            </div>
                        </div>
                    </div>
                    <div style="overflow:auto;" >
                   <!--     <div class="tab step-tab" id="bloc_fin">
                            <h1 class="text-danger text-center">FIN</h1> 
                            <h4 class="text-center">L'ANStat VOUS REMERCIE POUR VOTRE COLLABORATION !</h4>
                        </div> -->
                        <div style="float:right;">
                        <button type="button" id="prevBtn" onclick="nextPrev(-1)">Précedent</button>
                        <button type="button" id="nextBtn" onclick="nextPrev(1)">Suivant</button>
                        </div>
                    </div> 
                    
                    <div style="text-align:center;margin-top:40px;">
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                    </div>
            </form> 
             
        </div>
 
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
            <div class="container py-5">
                <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <a href="<?= route_to('home') ?>">
                                <h1 class="text-warning mb-0">ANStat</h1>
                               
                            </a>
                        </div>
                        <div class="col-lg-6">
                             
                        </div>
                        <div class="col-lg-3">
                            <div class="d-flex justify-content-end pt-3">
                                <a class="btn  btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-youtube"></i></a>
                                <a class="btn btn-outline-secondary btn-md-square rounded-circle" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
              
            </div>
        </div>
      
        <div class="container-fluid copyright bg-dark py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <span class="text-light"><a href="https://www.anstat.ci" target="_blank" class="text-warning"><i class="fas fa-copyright text-light me-2"></i>ANStat</a>, Tous droits réservés.</span>
                    </div>
                    <div class="col-md-6 my-auto text-center text-md-end text-white">
                        
                    </div>
                </div>
            </div>
        </div>
        
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top "><i class="fa fa-arrow-up"></i></a>   
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url() ?>assets/lib/easing/easing.min.js"></script>
        <script src="<?= base_url() ?>assets/lib/waypoints/waypoints.min.js"></script>
        <script src="<?= base_url() ?>assets/lib/lightbox/js/lightbox.min.js"></script>
        <script src="<?= base_url() ?>assets/lib/owlcarousel/owl.carousel.min.js"></script> 
        <script src="<?= base_url() ?>assets/js/main.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- CSS -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <!-- JS -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>

        <script>
            $(document).ready(function() { 

                <?php if (session()->getFlashdata('status')) { ?>
                    swal({
                        title: "<?= session()->getFlashdata('status') ?>",
                        text: "<?= session()->getFlashdata('status_text') ?>",
                        icon: "<?= session()->getFlashdata('status_icon') ?>",
                    });

                <?php } ?>
            });
        </script>
        <script>
            const selectedOrder = []; 
            document.querySelectorAll('.ordre-check').forEach(checkbox => {
                checkbox.addEventListener('change', function () {
                    const value = this.value;
                    if (this.checked) { 
                        if (!selectedOrder.includes(value)) {
                            selectedOrder.push(value);
                        }
                    } else { 
                        const index = selectedOrder.indexOf(value);
                        if (index > -1) {
                            selectedOrder.splice(index, 1);
                        }
                    }  
                    document.getElementById('ordreE1').value = selectedOrder.join(',');
                });
            });

            document.addEventListener("DOMContentLoaded", function() {
                const dateField = document.getElementById("datecollecte_deb");
                if (dateField) {
                    const now = new Date(); 
                    const formattedDate = now.toISOString().slice(0, 19); 
                    dateField.value = formattedDate;
                }
            });

        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const e1tCheckbox = document.getElementById('e1t');
                const blocE1t = document.getElementById('bloc_E1t_autre'); 
                function toggleBlocE1t() {
                    if (e1tCheckbox.checked) {
                        blocE1t.style.display = 'block';
                    } else {
                        blocE1t.style.display = 'none';
                    }
                } 
                e1tCheckbox.addEventListener('change', toggleBlocE1t); 
                toggleBlocE1t();
            });
        </script>

        <script>
            
            document.addEventListener('DOMContentLoaded', function () {
                const e1u = document.getElementById('e1u');
                const autres = [...document.querySelectorAll('.ordre-check')].filter(cb => cb.id !== 'e1u');
                const E1t_autre = [...document.querySelectorAll('.ordre-check')].filter(cb => cb.id === 'e1t');

                function mettreAJourEtat() {
                    if (e1u.checked) { 
                        autres.forEach(cb => {
                            cb.checked = false;
                            cb.disabled = true;
                        });
                    } else { 
                        autres.forEach(cb => cb.disabled = false);
                    } 
                    const unAutreCoche = autres.some(cb => cb.checked);
                    e1u.disabled = unAutreCoche;
                }
 
                e1u.addEventListener('change', mettreAJourEtat); 
                autres.forEach(cb => cb.addEventListener('change', mettreAJourEtat));

                // Initialisation
                mettreAJourEtat();
            });
        </script>



        <script>
            let currentTab = 0;  
            let aSauteSection = false; 

            showTab(currentTab);   

            function showTab(n) {
                const tabs = document.querySelectorAll('.step-tab');
                const nextBtn = document.getElementById("nextBtn");
                const prevBtn = document.getElementById("prevBtn");

                tabs.forEach(tab => tab.style.display = "none");
                tabs[n].style.display = "block"; 

                const currentId = tabs[n].id; 

                /*if (currentId === "section12") {
                    nextBtn.style.display = "none";
                    setTimeout(() => {
                        document.getElementById("regForm").submit();
                    }, 1000);
                } else {
                    nextBtn.style.display = "inline";
                    nextBtn.innerHTML = "Suivant";
                }
                    */
                if (currentId === "section12") { 
                    nextBtn.style.display = "none";
                } else {
                    nextBtn.style.display = "inline";
                    nextBtn.innerHTML = "Suivant";
                } 

                prevBtn.style.display = (n === 0 || (aSauteSection && currentId === "section12")) ? "none" : "inline";

                fixStepIndicator(n);
            }


            function nextPrev(n) {
                const x = document.querySelectorAll(".step-tab");

                if (n === 1 && !validateForm()) return false;

                const c17 = document.getElementById("C17");

                if (n === 1 && c17 && (c17.value === "1" || c17.value === "4")) {
                    x[currentTab].style.display = "none";
                    currentTab = x.length - 1;
                    aSauteSection = true;
                    showTab(currentTab);
                    return;
                }

                x[currentTab].style.display = "none";

                const F05 = document.getElementById("F05")?.value;
                const C20 = document.getElementById("C20")?.value;
                const section11Index = Array.from(x).findIndex(tab => tab.id === "section11"); //
                //const section9Index = Array.from(x).findIndex(tab => tab.id === "section9"); //

                if ((F05 === "1" && currentTab + 1 === section11Index) ) {
                    currentTab += 2;
                } else {
                    currentTab += n;
                }

                if (currentTab >= x.length) {
                    return false;  
                }

                aSauteSection = false; 
                showTab(currentTab);
            }

            function validateForm() {
                let valid = true;
                const x = document.querySelectorAll(".step-tab");
                const inputs = x[currentTab].querySelectorAll("input, select,number,tel,email, textarea");

                inputs.forEach(input => {
                    const isVisible = !!(input.offsetWidth || input.offsetHeight || input.getClientRects().length);
                    const isRequired = input.hasAttribute("required");
                    const isEmpty = input.value.trim() === ""; 
                    const next = input.nextElementSibling;
                    if (next && next.classList.contains("error-message")) {
                        next.remove();
                    }
 
                    const phoneIDs = ['C6_1', 'C6_2', 'C20b_4', 'C3a_1', 'C3a_2','contact'];
                    const regexTelephone = /^(01|05|07|21|25|27)\d{8}$/;
                     let rawValue = input.value.replace(/\D/g, '').slice(0, 14); // Supprimer tout sauf chiffres, max 10 chiffres
 
                        // Validation
                        const cleaned = rawValue;

                    if (isVisible && phoneIDs.includes(input.id) && isRequired) {
                       
                        if (!regexTelephone.test(cleaned)) {
                            errorMessage = "Numéro invalide. Il doit commencer par 01, 05, 07, 21 ou 25 et comporter 10 chiffres.";
                            input.classList.add("invalid");
                            valid = false;
                        }
                    }

                    if (isVisible && isRequired && isEmpty) {
                        input.classList.add("invalid");
                        valid = false;

                        const error = document.createElement("div");
                        error.classList.add("error-message");
                        error.textContent = "Ce champ est obligatoire";

                        input.parentNode.insertBefore(error, input.nextSibling);
                    } else {
                        input.classList.remove("invalid");
                    }

                      // Vérification format email
                    if (input.type === "email" && input.value.trim() !== "") {
                        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                        if (!emailRegex.test(input.value.trim())) {
                         input.classList.add("invalid");
                         valid = false;
                            const error = document.createElement("div");
                            error.className = "error-message";
                            error.style.color = "red";
                            error.textContent = "Adresse email invalide.";
                            input.parentNode.insertBefore(error, input.nextSibling);
                        }
                    }

                    const champSite = document.getElementById('C9');
                    const regexSiteWeb = /^(https?:\/\/)?(www\.)?[\w\-]+\.[a-z]{2,}(\.[a-z]{2,})?(\/[^\s]*)?$/i;
                    const siteValue = champSite.value.trim();
                    const siteErrorId = "error-C9";
                    const existingSiteError = document.getElementById(siteErrorId);
                    if (existingSiteError) existingSiteError.remove();

                    if (isVisible && siteValue !== "" && !regexSiteWeb.test(siteValue)) {
                        valid = false;
                        const error = document.createElement('div');
                        error.id = siteErrorId;
                        error.className = 'error-message';
                        error.style.color = "red";
                        error.textContent = "Format de site invalide. Exemple : web.com ou https://web.com";
                        champSite.classList.add("invalid");
                        champSite.parentNode.insertBefore(error, champSite.nextSibling);
                    } else {
                        champSite.classList.remove("invalid");
                    }

                   

                    const valA = parseFloat(document.getElementById('C23a').value.trim()) || 0;
                    const valB = parseFloat(document.getElementById('C23b').value.trim()) || 0;
                    const valC = parseFloat(document.getElementById('C23c').value.trim()) || 0;

                    const champC23a = document.getElementById('C23a');
                    const errorIdC23 = "error-C23a";
                    const existingError = document.getElementById(errorIdC23);
                    if (existingError) existingError.remove();

                    if (isVisible && (valA !== (valB + valC))) {
                        valid = false;
                        const error = document.createElement('div');
                        error.id = errorIdC23;
                        error.className = 'error-message';
                        error.style.color = "red";
                        error.textContent = "La valeur est incorrecte .";
                        champC23a.classList.add("invalid");
                        champC23a.parentNode.insertBefore(error, champC23a.nextSibling);
                    } else {
                        champC23a.classList.remove("invalid");
                    }

                    
                 
                    if (input.id === "C21_2") {
                        const ageErrorId = 'error-C21_2';
                        const ageValue = parseInt(input.value.trim(), 10);
                        const existingAgeError = document.getElementById(ageErrorId);
                        if (existingAgeError) existingAgeError.remove();

                        if (isVisible && !isNaN(ageValue) && ageValue < 15) {
                            valid = false;
                            input.classList.add("invalid");
                            const error = document.createElement('div');
                            error.id = ageErrorId;
                            error.className = 'error-message';
                            error.style.color = "red";
                            error.textContent = "L'âge doit être supérieur ou égal à 15.";
                            input.parentNode.insertBefore(error, input.nextSibling);
                        } else {
                            input.classList.remove("invalid");
                        }
                    }


                });
 
                if (valid) {
                    document.getElementsByClassName("step")[currentTab]?.classList.add("finish");
                }

                return valid;
            }

               


            function fixStepIndicator(n) { 
                const steps = document.getElementsByClassName("step");
                Array.from(steps).forEach(step => step.classList.remove("active"));
                if (steps[n]) steps[n].classList.add("active");
            }

            document.addEventListener("DOMContentLoaded", function () {
                const c17 = document.getElementById("C17");
                if (c17) {
                    c17.addEventListener("change", function () {
                        if (!validateForm()) return;
                        if (this.value === "1" || this.value === "4") {
                            const x = document.querySelectorAll(".step-tab");
                            x[currentTab].style.display = "none";
                            currentTab = x.length - 1;
                            showTab(currentTab);
                        }
                    });
                }
            });
        </script>
       <script>
    document.addEventListener("DOMContentLoaded", function () {
        $("#btnGPS").on("click", function () {
            if (!navigator.geolocation) {
                console.error("La géolocalisation n'est pas supportée par ce navigateur.");
                return;
            }

            if (navigator.permissions) {
                navigator.permissions.query({ name: 'geolocation' }).then(function (result) {
                    if (result.state === 'granted' || result.state === 'prompt') {
                        demanderGeolocalisation();
                    } else {
                        alert("Géolocalisation bloquée. Veuillez autoriser manuellement dans les paramètres du navigateur.");
                    }
                });
            } else {
                demanderGeolocalisation();
            }
        });

          $("#btnGPS2").on("click", function () {
            if (!navigator.geolocation) {
                console.error("La géolocalisation n'est pas supportée par ce navigateur.");
                return;
            }

            if (navigator.permissions) {
                navigator.permissions.query({ name: 'geolocation' }).then(function (result) {
                    if (result.state === 'granted' || result.state === 'prompt') {
                        demanderGeolocalisation();
                    } else {
                        alert("Géolocalisation bloquée. Veuillez autoriser manuellement dans les paramètres du navigateur.");
                    }
                });
            } else {
                demanderGeolocalisation();
            }
        });
        function demanderGeolocalisation() {
            navigator.geolocation.getCurrentPosition(
                function (position) {
                    mettreAJourChamps(position);
                },
                function (error) {
                    console.error("Erreur de géolocalisation : " + error.message);
                },
                {
                    enableHighAccuracy: true
                }
            );
        }

        function mettreAJourChamps(position) {
            const { longitude, latitude, accuracy } = position.coords;

            document.getElementById("B8b_1").value = longitude;
            document.getElementById("B8b_2").value = latitude;
            document.getElementById("B8b_3").value = accuracy;

            document.getElementById("B8c3_1").value = longitude;
            document.getElementById("B8c3_2").value = latitude;
            document.getElementById("B8c3_3").value = accuracy; 
        }
    });
</script>



        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const champsTelephone = ['C6_1', 'C6_2', 'C20b_4', 'C3a_1', 'C3a_2','contact'];
                const regexTelephone = /^(01|05|07|21|25|27)\d{8}$/;

                champsTelephone.forEach(id => {
                    const input = document.getElementById(id);
                    if (!input) return;

                    input.addEventListener('input', function () {
                        let rawValue = this.value.replace(/\D/g, '').slice(0, 14); // Supprimer tout sauf chiffres, max 10 chiffres

                        // Format en XX-XX-XX-XX-XX
                        let formatted = rawValue.match(/.{1,2}/g)?.join('-') || '';
                        this.value = formatted;

                        // Validation
                        const cleaned = rawValue;
                        const errorId = `error-${id}`;
                        const existingError = document.getElementById(errorId);
                        if (existingError) existingError.remove();

                        if (!regexTelephone.test(cleaned)) {
                            input.classList.add("invalid");
                            valid = false;  
                            const error = document.createElement('div');
                            error.id = errorId;
                            error.className = 'error-message';
                            error.style.color = "red"; 
                            error.textContent = "Le numéro doit contenir exactement 10 chiffres et commencer par 01, 05, 07, 21, 25 ou 27.";

                            this.parentNode.insertBefore(error, this.nextSibling);
                        } else {
                            this.classList.remove('invalid');
                        }
                    });

                    // Empêcher la saisie non numérique
                    input.addEventListener('keypress', function (e) {
                        if (!/\d/.test(e.key)) {
                            e.preventDefault();
                        }
                    });
                });
            });
        </script> 
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const C10a = document.getElementById('C10a');
                const C11a = document.getElementById('C11a');
                const C10m = document.getElementById('C10m');
                const C11m = document.getElementById('C11m');

                function validateFields() {
                    const valC10a = C10a.value.trim();
                    const valC11a = C11a.value.trim();
                    const valC10m = C10m.value;
                    const valC11m = C11m.value;

                    removeError('C10a');
                    removeError('C11a');
                    removeError('C11m');

                    let valid = true;
                    const isValidYear = year => /^\d{4}$/.test(year);

                    // Vérification année format
                    if (!isValidYear(valC10a)) {
                        showError(C10a, "Entrez une année valide à 4 chiffres (ex : 2000)");
                        valid = false;
                    }

                    if (!isValidYear(valC11a)) {
                        showError(C11a, "Entrez une année valide à 4 chiffres (ex : 2005)");
                        valid = false;
                    }

                    // Vérification année max = 2025
                    if (valid && (+valC10a > 2025 || +valC11a > 2025)) {
                        if (+valC10a > 2025) showError(C10a, "L'année ne doit pas dépasser 2025.");
                        if (+valC11a > 2025) showError(C11a, "L'année ne doit pas dépasser 2025.");
                        valid = false;
                    }

                    // Comparaison des années
                    if (valid && +valC11a < +valC10a) {
                        showError(C11a, "L'année de début d’exploitation ne doit pas être inférieure à l'année de création.");
                        valid = false;
                    }

                    // Si années égales, vérifier les mois uniquement si valeurs valides et différentes de 99
                    if (valid && +valC10a === +valC11a) {
                        if (valC10m === "" || valC11m === "") {
                            showError(C11m, "Veuillez sélectionner un mois.");
                            valid = false;
                        } else if (valC10m !== "99" && valC11m !== "99") {
                            if (+valC11m < +valC10m) {
                                showError(C11m, "Le mois de début d’exploitation ne doit pas être antérieur au mois de création.");
                                valid = false;
                            }
                        }
                    }

                    return valid;
                }

                function showError(input, message) {
                    input.classList.add("invalid");
                    const errorId = `error-${input.id}`;
                    let error = document.getElementById(errorId);

                    if (!error) {
                        error = document.createElement("div");
                        error.id = errorId;
                        error.classList.add("error-message");
                        input.parentNode.insertBefore(error, input.nextSibling);
                    }
                    error.textContent = message;
                }

                function removeError(id) {
                    document.getElementById(id)?.classList.remove("invalid");
                    const error = document.getElementById(`error-${id}`);
                    if (error) error.remove();
                }

                [C10a, C11a, C10m, C11m].forEach(element => {
                    element.addEventListener('input', validateFields);
                    element.addEventListener('change', validateFields);
                });
            });
        </script>
<script>
    $(document).ready(function() {
        $('#B4_1').select2({
            placeholder: "--Choisir--",
            allowClear: true,
            width: '100%'
        });
        $('#B8').select2({
            placeholder: "--Choisir--",
            allowClear: true,
            width: '100%'
        });
    });

    
</script>



        <script>
                document.addEventListener('DOMContentLoaded', function () { 
                const C18 = document.getElementById('C18');
                const C21_3 = document.getElementById('C21_3');
                const C25 = document.getElementById('C25'); 
                const C20a = document.getElementById('C20a'); 

                const B8 = document.getElementById('B8');
                const C13 = document.getElementById('C13');
                const C20 = document.getElementById('C20');
                const C16 = document.getElementById('C16'); 
                const F01 = document.getElementById("F01");
                const F02 = document.getElementById("F02");
                const F03 = document.getElementById("F03");
                const F04 = document.getElementById("F04");
                const F05 = document.getElementById("F05");
                const C3a_1 = document.getElementById("C3a_1");
                const C6_1 = document.getElementById("C6_1"); 

                function toggleVisibility(condition, elementId) {
                    const el = document.getElementById(elementId);
                    if (!el) return;

                    if (condition) {
                        el.style.display = "block"; 
                        el.querySelectorAll("[data-was-required]").forEach(input => {
                            input.setAttribute("required", "true");
                            input.removeAttribute("data-was-required");
                        });
                    } else {
                        el.style.display = "none"; 
                        el.querySelectorAll("input, select, textarea").forEach(input => {
                            if (input.required) {
                                input.setAttribute("data-was-required", "true");
                                input.removeAttribute("required");
                            }
                        });
                    }
                }

                function toggleVisibilityInverse(condition, elementId) {
                    toggleVisibility(!condition, elementId);
                }

                /* function toggleVisibility(condition, elementId) {
                    const el = document.getElementById(elementId);
                    if (!el) return;
                    el.style.display = condition ? 'block' : 'none';
                }

               function toggleVisibilityInverse(condition, elementId) {
                    const el = document.getElementById(elementId);
                    if (!el) return;
                    el.style.display = condition ? 'none' : 'block';
                } */

                function updateVisibility() {
                    const C18Val = C18?.value;
                    const C21_3Val = C21_3?.value;
                    const C25Val = C25?.value;
                    const C20aVal = C20a?.value;
                    const C12bVal = C12b?.value;
                    

                    const C3a_1Val = C3a_1?.value;
                    const C6_1Val = C6_1?.value; 
                    const b8Val = B8?.value;
                    const c13Val = C13?.value;
                    const c20Val = C20?.value;
                    const C16Val = C16?.value;  
                    const F01Val = F01?.value;  
                    const F02Val = F02?.value;   
                    const F03Val = F03?.value;   
                    const F04Val = F04?.value;  
                    const F05Val = F05?.value;  
                    toggleVisibility( (F01Val === "2" && F02Val === "2") || (F01Val === "1" && F04Val === "2") ||  (F02Val === "1" && F04Val === "2") ||  F05Val === "1", 'bloc_C18');
                    toggleVisibility( (F01Val === "2" && F02Val === "2") || (F01Val === "1" && F04Val === "2") ||  (F02Val === "1" && F04Val === "2") , 'bloc_C19');
                    toggleVisibility(C3a_1Val !== '', 'bloc_C3a_2');
                    toggleVisibility(C6_1Val !== '', 'bloc_C6_2');

                    toggleVisibility(C12bVal === '37', 'bloc_C12b');
                    toggleVisibility(C18Val === '11', 'bloc_C18_11');
                    toggleVisibility(C21_3Val ===  '6', 'bloc_C21_3_6');
                    toggleVisibility(C25Val === '6', 'bloc_C25_6');
                    
                    toggleVisibility(C16Val === '1', 'bloc_C19a');
                    toggleVisibility((c20Val === '2') , 'bloc_C20b');
                    toggleVisibility(c20Val === '1' , 'bloc_C20a');
                    toggleVisibility((c20Val === '1' && C20aVal > 0 ), 'bloc_C20c');
                    toggleVisibility(F01Val === '1', 'bloc_F01a');
                    toggleVisibility(F02Val === '1', 'bloc_F02a'); 

                    toggleVisibility(b8Val !== '4', 'bloc_B8b');
                    toggleVisibility(b8Val === '1' || b8Val === '2' || b8Val === '3', 'bloc_B8a');
                    toggleVisibility(b8Val === '2' || b8Val === '3', 'bloc_B8c1');
                    toggleVisibility(b8Val === '2' || b8Val === '3', 'bloc_B8c2');

                    toggleVisibility(c13Val === '1', 'bloc_C13a');

                    //
                    toggleVisibilityInverse((F05Val ==='1') || ((F01Val ==='2') || (F02Val ==='2' && F03Val ==='2')), 'bloc_C16');
                    toggleVisibilityInverse((F05Val ==='1') || ((F01Val ==='2') || (F02Val ==='2' && F03Val ==='2')), 'bloc_C18');
                    toggleVisibilityInverse((F05Val ==='1') || ((F01Val ==='2') || (F02Val ==='2' && F03Val ==='2')), 'bloc_C19');
                    toggleVisibilityInverse((F05Val ==='1') || ((F01Val ==='2') || (F02Val ==='2' && F03Val ==='2')), 'bloc_C24');
                }
 
                [C3a_1,C6_1,C18,C21_3,C25,C20a,C12b, B8, C13, C16,C20,F01,F03,F02,F04,F05].forEach(field => {
                    if (field) {
                        field.addEventListener('change', updateVisibility);
                    }
                }); 
                updateVisibility();
            });
        </script>
        <script>   
                function checkLimitC20c() {
                    const max = parseInt($('#C20a').val(), 10);
                    const rows = $('.addMoreC20c tr').length;

                    if (!isNaN(max) && rows >= max) {
                        $('.add_moreC20c').prop('disabled', true);
                    } else {
                        $('.add_moreC20c').prop('disabled', false);
                    }
                } 
                $('#C20a').on('input', checkLimitC20c); 
                $('.add_moreC20c').on('click',function(){
                        const maxRows = parseInt($('#C20a').val(), 10); 
                        const currentRows = $('.addMoreC20c tr').length;
                        if (!isNaN(maxRows) && currentRows >= maxRows) {
                            alert('Vous avez atteint le nombre d’établissements déclarés.');
                            return;
                        }else{
                            const numberofrow = currentRows + 1;
                            var tr = '<tr><td>'+ numberofrow +'</td>'+ 
                                "<td> <input type='text' class='form-control' name='nom_etablissement[]' id='nom_etablissement'   required> </td>"+
                                "<td> <input type='text' class='form-control' name='adresse[]' id='adresse'  required></td>"+
                                "<td> <input type='text' class='form-control' name='localite[]' id='localite'   required></td>"+
                                "<td> <input type='text' class='form-control' name='contact[]' id='contact' placeholder='Ex: 0701020304' pattern='^\d{14}$' maxlength='14' required  required></td>"+
                                "<td><a href='#'' class='btn btn-sm btn-danger rounded-circle delete'><i class='fa fa-times'></i></a></td>";
                                $('.addMoreC20c').append(tr);
                        }
                        checkLimitC20c();
                    });  

                    $('.addMoreC20c').delegate('.delete', 'click', function(){
                        if (document.getElementById("table_C20c").rows.length-1  > 1) {
                            $(this).parent().parent().remove();
                        }
                    });  

                    $('.add_moreC13a').on('click',function(){
                        var numberofrow = ($('.addMoreC13a tr').length - 0) + 1;
                        var tr = '<tr><td>'+ numberofrow +'</td>'+ 
                            "<td> <input type='text' class='form-control' name='C13a_AS[]' id='C13a_AS' placeholder='Activité secondaire'   required> </td>"+ 
                            "<td><a href='#'' class='btn btn-sm btn-danger rounded-circle delete'><i class='fa fa-times'></i></a></td>";
                            $('.addMoreC13a').append(tr);
                    });  

                    $('.addMoreC13a').delegate('.delete', 'click', function(){
                        if (document.getElementById("table_C13a").rows.length-1  > 1) {
                            $(this).parent().parent().remove();
                        }
                    }); 
        </script>


        <script>
            document.addEventListener('DOMContentLoaded', function() {
            //REGIONS 
                        const fields = {
                            district: $('#B1'),
                            region: $('#B2'),
                            departement: $('#B3'),
                            ssprefecture: $('#B4_1'),
                        };
                        fields.district.off('change').on('change', function () { 
                            let region = $('#B2');
                            region.empty();
                            var base = '<?= site_url() ?>';
                            var district = $("#B1").val(); 
                            var Url = base + '/get-regions';  
                            var data = {
                                CodDist: district
                            };
                            $.post(Url, data, function (data, status) {
                                let region = $('#B2');
                                region.empty();  

                                if (data.success) { 
                                    if (data.data && data.data.length > 0) { 
                                        region.append("<option value='' disabled selected>-- Choisir un région --</option>");
                                        
                                        $.each(data.data, function (i, item) {
                                            region.append("<option value='" + item.cod_reg + "'>" + item.nom_reg + "</option>");
                                        });
                                    } else { 
                                        region.append("<option value='' disabled selected>--Aucun région trouvé--</option>");
                                    }
                                } else { 
                                    region.append("<option value='' disabled selected>--Erreur lors du chargement des données--</option>");
                                }
                            }, 'json');

                        }); 
                        fields.region.off('change').on('change', function () {
                
                            let departement = $('#B3');
                            departement.empty();
                            var base = '<?= site_url() ?>';
                            var region = $("#B2").val(); 
                            var Url = base + '/get-departements';  
                            var data = {
                                CodReg: region, 
                            };
                            $.post(Url, data, function (data, status) {
                                let departement = $('#B3');
                                departement.empty(); 

                                if (data.success) { 
                                    if (data.data && data.data.length > 0) { 
                                        departement.append("<option value='' disabled selected>-- Choisir un département --</option>");
                                        
                                        $.each(data.data, function (i, item) {
                                            departement.append("<option value='" + item.cod_dep + "'>" + item.nom_dep + "</option>");
                                        });
                                    } else { 
                                        departement.append("<option value='' disabled selected>--Aucun département trouvé--</option>");
                                    }
                                } else { 
                                    departement.append("<option value='' disabled selected>--Erreur lors du chargement des données--</option>");
                                }
                            }, 'json');

                        });
                        fields.departement.off('change').on('change', function () {
        
                            let ssprefecture = $('#B4_1');
                            ssprefecture.empty();
                            var base = '<?= site_url() ?>';
                            var departement = $("#B3").val(); 
                            var Url = base + '/get-sous-prefectures'; 
                            var data = {
                                CodDep: departement, 
                            };
                            $.post(Url, data, function (data, status) {
                                let ssprefecture = $('#B4_1');
                                ssprefecture.empty();  

                                if (data.success) { 
                                    if (data.data && data.data.length > 0) { 
                                        ssprefecture.append("<option value='' disabled selected>-- Choisir une sous préfecture --</option>");
                                        
                                        $.each(data.data, function (i, item) {
                                            ssprefecture.append("<option value='" + item.cod_sp + "'>" + item.nom_sp + "</option>");
                                        });
                                    } else { 
                                        ssprefecture.append("<option value='' disabled selected>--Aucune sous préfecture trouvée--</option>");
                                    }
                                } else { 
                                    ssprefecture.append("<option value='' disabled selected>--Erreur lors du chargement des données--</option>");
                                }
                            }, 'json');

                        });
                        fields.ssprefecture.off('change').on('change', function () { 
                            let localite = $('#B7a');
                            localite.empty();
                            var base = '<?= site_url() ?>'; 
                            var ssprefecture = $("#B4_1").val(); 
                             var departement = $("#B3").val(); 
                            var Url = base + '/get-localites';  
                            var data = { 
                                CodSp: ssprefecture, 
                                CodDep: departement, 
                            };
                            $.post(Url, data, function (data, status) {
                                let localite = $('#B7a');
                                localite.empty();   
                                if (data.success) {  
                                    if (data.data && data.data.length > 0) { 
                                        localite.append("<option value='' disabled selected>-- Choisir une localité --</option>");
                                        
                                        $.each(data.data, function (i, item) {
                                            localite.append("<option value='" + item.cod_loc + "'>" + item.nom_loc + "</option>");
                                        });
                                    } else { 
                                        localite.append("<option value='' disabled selected>--Aucune localité trouvée--</option>");
                                    }
                                } else { 
                                    localite.append("<option value='' disabled selected>--Erreur lors du chargement des données--</option>");
                                }
                            }, 'json');

                        });
                    

            });  
        </script>
        <script>
            $("#finalSubmit").on("click", function (e) {
                e.preventDefault();

                var form = $("#regForm");

                // On supprime "required" + disable les champs invisibles
                form.find("input, select, textarea").each(function () {
                    if ($(this).is(":hidden")) {
                        $(this).removeAttr("required").prop("disabled", false);
                    }
                });

                // On prépare FormData
                var data = new FormData(); 
                const dateFieldFIN = document.getElementById("datecollecte_fin");
                if (dateFieldFIN) {
                    const now = new Date(); 
                    const formattedDate = now.toISOString().slice(0, 19); 
                    dateFieldFIN.value = formattedDate;
                }
                // Récupère les champs du formulaire (version sérialisée)
                var form_data = form.serializeArray();
                $.each(form_data, function (key, input) {
                    data.append(input.name, input.value);
                });
  
                var $loading = $('div#ec-modal-loading');
                var base = '<?= site_url() ?>';  
                var post_url = base + '/questionnaire/store';  
                $.ajax({
                    type: 'POST',
                    contentType: false,
                    processData: false,
                    url: post_url,
                    data: data,
                    beforeSend: function () {
                        $loading.css('display', 'block');
                    }
                })
                .done(function (data) {
                    $("#formResponse").html(
                        "<p class='text-success'>" + data.message + "</p>"
                    );
                    $("#finalSubmit").hide();
                    $("#downloadPDF").show();
                    $("#finQuestion").show();
                    
                    // Stocker les données postées pour le PDF
                    window.formDataPosted = data.data; 
                })
                .fail(function (data) {
                    $("#formResponse").html(
                        "<p class='text-danger'>Une erreur est survenue lors de la soumission.</p>"
                    );
                })
                .always(function (data) {
                    $loading.css('display', 'none');
                });
            });

        </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script> 
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>

        <script> 
               /*  function generatePDF() {  
                    const { jsPDF } = window.jspdf;
                    const doc = new jsPDF(); 
                     
                    const logoAnstat = "<?= base_url('assets/img/logo_anstat.png') ?>";
                    const logoArmoirie = "<?= base_url('assets/img/armoirie.png') ?>";
 
                    doc.addImage(logoAnstat, "PNG", 10, 5, 40, 20);    
                    doc.addImage(logoArmoirie, "PNG", 160, 5, 40, 20);  
 
                    doc.setFontSize(14);
                    doc.text("QUESTIONNAIRE DE RECENSEMENT", 105, 35, { align: "center" });
                    
                    const values = window.formDataPosted || {}; 
                    const rows = Object.entries(values).map(([name, val]) => [name, val]); 
                    doc.autoTable({
                        head: [['Libelle', 'Valeur saisie']],
                        body: rows,
                        startY: 55,
                        styles: { fontSize: 10 },
                        headStyles: { fillColor: [73, 101, 90], textColor: 255 } ,
                        didDrawPage: function (data) { 
                            let pageCount = doc.internal.getNumberOfPages();
                            let pageSize = doc.internal.pageSize;
                            let pageHeight = pageSize.height ? pageSize.height : pageSize.getHeight();

                            doc.setFontSize(9);
                            doc.text(
                                "Page " + doc.internal.getCurrentPageInfo().pageNumber ,
                                pageHeight - 10,
                                { align: "center" }
                            );
                        }
                    });

                    doc.save("mes_reponses_questionnaire.pdf");
                } */
            function generatePDF() {  
                const { jsPDF } = window.jspdf;
                const doc = new jsPDF(); 

                // Logos
                const logoAnstat = "<?= base_url('assets/img/logo_anstat.png') ?>";
                const logoArmoirie = "<?= base_url('assets/img/armoirie.png') ?>";

                doc.addImage(logoAnstat, "PNG", 10, 5, 40, 20);    
                doc.addImage(logoArmoirie, "PNG", 160, 5, 40, 20);  

                // Titre
                doc.setFontSize(14);
                doc.text("QUESTIONNAIRE DE RECENSEMENT", 105, 40, { align: "center" });

                const values = window.formDataPosted || {}; 

                // ========================
                // Tableau principal (hors sous-tableaux)
                // ========================
                const mainRows = [];
                for (const [name, val] of Object.entries(values)) {
                    if (name !== "Activités secondaire" && name !== "Etablissements") {
                        mainRows.push([name, val]);
                    }
                }

                doc.autoTable({
                    head: [['Libellé', 'Valeur saisie']],
                    body: mainRows,
                    startY: 55,
                    styles: { fontSize: 10 },
                    headStyles: { fillColor: [73, 101, 90], textColor: 255 },
                });

                let finalY = doc.lastAutoTable.finalY + 10;

                // ========================
                // Activités secondaire
                // ========================
                if (values["Activités secondaire"]) {
                    const actRows = Object.entries(values["Activités secondaire"]).map(
                        ([key, val]) => [key, val]
                    );

                    doc.text("Activités secondaire", 14, finalY);
                    finalY += 5;

                    doc.autoTable({
                        head: [['Activité', 'Valeur']],
                        body: actRows,
                        startY: finalY,
                        styles: { fontSize: 10 },
                        headStyles: { fillColor: [73, 101, 90], textColor: 255 },
                    });

                    finalY = doc.lastAutoTable.finalY + 10;
                }

                // ========================
                // Etablissements
                // ========================
                if (values["Etablissements"]) {
                    const etabRows = Object.entries(values["Etablissements"]).map(
                        ([index, etab]) => [
                            "Établissement " + (parseInt(index) + 1),
                            Object.entries(etab)
                                .map(([k, v]) => `${k}: ${v}`)
                                .join("\n")
                        ]
                    );

                    doc.text("Etablissements", 14, finalY);
                    finalY += 5;

                    doc.autoTable({
                        head: [['Établissement', 'Données']],
                        body: etabRows,
                        startY: finalY,
                        styles: { fontSize: 10 },
                        headStyles: { fillColor: [73, 101, 90], textColor: 255 },
                    });

                    finalY = doc.lastAutoTable.finalY + 10;
                }

                // ========================
                // Pagination
                // ========================
                const pageCount = doc.internal.getNumberOfPages();
                for (let i = 1; i <= pageCount; i++) {
                    doc.setPage(i);
                    doc.setFontSize(9);
                    doc.text(
                        "Page " + i + " / " + pageCount,
                        doc.internal.pageSize.width / 2,
                        doc.internal.pageSize.height - 10,
                        { align: "center" }
                    );
                }

                doc.save("mes_reponses_questionnaire.pdf");
}


            document.getElementById("downloadPDF").addEventListener("click", function() {
                generatePDF();
            });
        </script>

    </body>

</html>