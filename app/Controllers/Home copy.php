<?php

namespace App\Controllers;

use App\Libraries\AnstatApi;
use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\I18n\Time;

class Home extends BaseController
{

   
    /**
     * @var AuthConfig
     */
    protected $config;

    /**
     * @var Session
     */
    protected $session;

    public function __construct()
    {
        $this->session = service('session');
 
     
    }

    public function index()
    { 
         return redirect()->to(route_to('register'));
    }
    public function home()
    {
        
        $api = new AnstatApi();
        $sousPrefectures = $api->getAllSousp();

        $data = [
            'sousPrefectures' => $sousPrefectures
        ];
        return view('index', $data);
    }

    public function getReg()
    {
        $api = new AnstatApi();
        $regions = $api->getRegions($this->request->getPost('CodDist'));
        $responseData = [
            'success' => true,
            'data' => $regions,
        ];
        return $this->response->setJSON($responseData);
    }
    public function getDept()
    {
        $api = new AnstatApi();
        $departements = $api->getDepartements($this->request->getPost('CodReg'));
        $responseData = [
            'success' => true,
            'data' => $departements,
        ];
        return $this->response->setJSON($responseData);
    }
    public function getSSP()
    {
        $api = new AnstatApi();
        $sousPrefectures = $api->getSousp($this->request->getPost('CodDep'));
        $responseData = [
            'success' => true,
            'data' => $sousPrefectures,
        ];
        return $this->response->setJSON($responseData);
    }
    public function getLoc()
    {
        $api = new AnstatApi();
        $localites = $api->getLocalite($this->request->getPost('CodDep'),$this->request->getPost('CodSp'));
        $responseData = [
            'success' => true,
            'data' => $localites,
        ];
        return $this->response->setJSON($responseData);
    }

    public function store()
    {
 

       
        //return $this->response->setJSON($this->request->getPost());
            $DatargeciModel = new \App\Models\DatargeciModel();
            $DatargeciAsModel = new \App\Models\DatargeciAsModel();
            $DatargeciEtModel = new \App\Models\DatargeciEtModel();

            $api = new AnstatApi();
            $getOneDistrict = $api->getOneDistrict($this->request->getPost('B1'));
            $getOneRegion = $api->getOneRegion($this->request->getPost('B2'));
            $getOneDept = $api->getOneDept($this->request->getPost('B3'));
            $getOneSp = $api->getOneSp($this->request->getPost('B3'),$this->request->getPost('B4_1'));
            $getOneLoc = $api->getOneLoc($this->request->getPost('B7a'),$this->request->getPost('B3'),$this->request->getPost('B4_1'));
            $now = Time::now();
            $ordreE1 =  $this->request->getPost('ordreE1');
            $valeurs = explode(',', $ordreE1);
            $B8 = $this->request->getPost('B8');
            $C12b = $this->request->getPost('C12b');
            $C18 = $this->request->getPost('C18');
            $C19 = $this->request->getPost('C19');
            $C21_3 = $this->request->getPost('C21_3');
            $C24 = $this->request->getPost('C24');
            $C25 = $this->request->getPost('C25'); 
            $valueC12b = null; 
            $valueC18 = null; 
            $valueC19 = null; 
            $valueC21_3 = null; 
            $valueC24 = null; 
            $valueC25 = null; 
            $valuee1 = []; 
            foreach ($valeurs as $key => $colonne) {
                switch($colonne){ //OK
                    case 'e1a':
                          $valuee1[$key] = 'Insuffisance de personnel qualifié';
                    break;
                    case 'e1b':
                          $valuee1[$key] = 'Coût élevé de la main d\'œuvre';
                    break;
                     case 'e1c':
                          $valuee1[$key] = 'Formalités administratives contraignantes';
                    break;
                     case 'e1d':
                          $valuee1[$key] = 'Taxes, patentes et impôts trop élevés';
                    break;
                     case 'e1e':
                          $valuee1[$key] = 'Coût du transport élevé (FRET)';
                    break;
                     case 'e1f':
                          $valuee1[$key] = 'Mauvais état des infrastructures routières';
                    break;
                     case 'e1g':
                          $valuee1[$key] = 'Difficultés d\'approvisionnement en matières premières et autres intrants (quantité et qualité)';
                    break;
                     case 'e1h':
                          $valuee1[$key] = 'Lourdeurs des procédures de règlement des contentieux';
                    break;
                     case 'e1i':
                          $valuee1[$key] = 'Difficultés d\'écoulement de la production/insuffisance de débouchés';
                    break;
                     case 'e1j':
                          $valuee1[$key] = 'Manque/ Faible accès aux technologies spécialisées';
                    break;
                     case 'e1k':
                          $valuee1[$key] = 'Manque de machines et pièces de rechange';
                    break;
                     case 'e1l':
                          $valuee1[$key] = 'Manque d’expertise technique (maintenance machines)';
                    break;
                     case 'e1m':
                          $valuee1[$key] = 'Manque de local adapté/terrain';
                    break;
                     case 'e1n':
                          $valuee1[$key] = 'Difficultés d\'accès à la commande publique';
                    break;
                     case 'e1o':
                          $valuee1[$key] = 'Accès limité aux structures d\'appui aux entreprises';
                    break;
                     case 'e1p':
                          $valuee1[$key] = 'Difficultés d\'accès au crédit (Banque et Microfinance)';
                    break;
                     case 'e1q':
                          $valuee1[$key] = 'Difficultés d\'approvisionnement en énergie';
                    break;
                     case 'e1r':
                          $valuee1[$key] = 'Concurrence déloyale';
                    break;
                     case 'e1s':
                          $valuee1[$key] = 'Corruption (racket, pot de vins, etc.)';
                    break;
                     case 'e1t':
                          $valuee1[$key] = 'Autres à préciser';
                    break;
                     case 'e1v':
                          $valuee1[$key] = 'Besoin de financement';
                    break;
                     case 'e1u':
                          $valuee1[$key] = 'Aucune contrainte';
                    break; 
                }
                
            }
            switch($C18){ //OK
                case 1: $valueC18 = "Société en Nom collectif" ;  
                break;
                case 2: $valueC18 = "Société en Commandite simple" ;  
                break;
                case 3: $valueC18 = "Société en Participations" ;  
                break;
                case 4: $valueC18 = "Société de fait" ;  
                break;
                case 5: $valueC18 = "Société à Responsabilité limitée (SARL)  " ;  
                break;
                case 6: $valueC18 = "Société par Actions simplifiées (SAS)" ;  
                break;
                case 7: $valueC18 = "Entreprise individuelle (pers. physique)    " ; 
                break; 
                case 8: $valueC18 = "Société anonyme (SA) " ;  
                break;
                case 9: $valueC18 = "Groupement d'Intérêt économique (GIE)" ; 
                break; 
                case 10: $valueC18 = "Ets public industriel et commercial (EPIC)" ;  
                break;
                case 11: $valueC18 = "Autre à préciser" ;   
                break;
            }
            switch($C19){ //OK
                case 1: $valueC19 = "Public" ;  
                break;
                case 2: $valueC19 = "Privé national" ;  
                break;
                case 3: $valueC19 = "Privé étranger" ;  
                break;
            }
            switch($C21_3){ //OK
                case 1: $valueC21_3 = "Président du Conseil d’Administration" ;  
                break;
                case 2: $valueC21_3 = "Directeur Général" ;  
                break;
                case 3: $valueC21_3 = "Administrateur Général" ;  
                break;
                case 4: $valueC21_3 = "Gérant" ;  
                break;
                case 5: $valueC21_3 = "Exploitant" ;  
                break;
                case 6: $valueC21_3 = "Autre à préciser" ;  
                break;
                case 7: $valueC21_3 = "Propriétaire" ;  
                break;

            }
            switch($C24){ //OK
                case 1: $valueC24 = "Inférieur ou égal à 30 millions" ;  
                break;
                case 2: $valueC24 = "Entre 30 millions et 150 millions" ;  
                break;
                case 3: $valueC24 = "Supérieur à 150 millions et inférieur ou égal à 1 milliard" ;  
                break;
                case 4: $valueC24 = "Strictement supérieur à 1 milliard" ;  
                break; 
            }
            switch($C25){ //OK
                case 1: $valueC25 = "Jours ouvrés et/ou ouvrables / Tous les jours - Activité de journée" ;  
                break;
                case 2: $valueC25 = "Jours ouvrés et/ou ouvrables / Tous les jours - Activité de nuit" ;  
                break;
                case 3: $valueC25 = "Des jours spécifiques en semaine - Activité de journée" ;  
                break;
                case 4: $valueC25 = "Des jours spécifiques en semaine - Activité de nuit" ;  
                break; 
                case 5: $valueC25 = "Jour de marché, d’affluence uniquement" ;  
                break;
                case 6: $valueC25 = "Autre à préciser" ;  
                break;
            }
            switch($C12b){ //OK
                case 1: $valueC12b = "Assurance" ; 
                break;
                case 2: $valueC12b = "Atelier de couture" ; 
                break;
                case 3: $valueC12b = "Auto-école" ; 
                break;
                case 4: $valueC12b = "Banque" ; 
                break;
                case 5: $valueC12b = "Boulangerie/pâtisserie" ; 
                break;
                case 6: $valueC12b = "Boutique/Superette" ;
                break;
                case 7: $valueC12b = "Clinique/Hôpital" ; 
                break;
                case 8: $valueC12b = "Coopérative" ;
                break;
                case 9: $valueC12b = "Cordonnerie" ; 
                break;
                case 10: $valueC12b = "Ferronnerie" ; 
                break;
                case 11: $valueC12b = "Garage" ;
                break;
                case 12: $valueC12b = "Grande surface/centre commercial" ; 
                break;
                case 13: $valueC12b = "Hôtel" ;
                break;
                case 14: $valueC12b = "Kiosque à café" ;
                break;
                case 15: $valueC12b = "Lavage (voiture, motos)" ; 
                break;
                case 16: $valueC12b = "Lieu de cultes" ;
                break;
                case 17: $valueC12b = "ONG/ Associations" ;
                break;
                case 18: $valueC12b = "Dépôt de boisson" ;
                break;
                case 19: $valueC12b = "Dépôt de gaz" ; 
                break;
                case 20: $valueC12b = "Enseignement" ; 
                break;
                case 21: $valueC12b = "Pharmacie" ; 
                break;
                case 22: $valueC12b = "Point de LOTTERIE" ; 
                break;
                case 23: $valueC12b = "Point mobile money" ;
                break;
                case 24: $valueC12b = "Poissonnerie" ;
                break;
                case 25: $valueC12b = "Pressing" ; 
                break;
                case 26: $valueC12b = "Restaurant/Bistrot/Bars/Maquis/Cave" ;
                break;
                case 27: $valueC12b = "Salon de beauté (coiffure homme et femme)" ;
                break;
                case 28: $valueC12b = "Vente sur table/étagère (étale)" ; 
                break;
                case 29: $valueC12b = "Cabine téléphonique" ;
                break;
                case 30: $valueC12b = "Quincaillerie" ; 
                break;
                case 31: $valueC12b = "Agence de placement" ;
                break;
                case 32: $valueC12b = "Service de réparation (téléphone, électroménager)" ; 
                break;
                case 33: $valueC12b = "Service immobilier" ;
                break;
                case 34: $valueC12b = "Vente de pièces détachées (voiture, moto,vélo)" ;
                break;
                case 35: $valueC12b = "Station-service" ; 
                break;
                case 36: $valueC12b = "Boutique de vêtements, sacs et accessoires" ; 
                break;
                case 37: $valueC12b = "Autre à préciser" ; 
                break;  
            } 
            $dataPDF = [      
                'Commune / Ville de l’entreprise'               => $getOneSp['nom_sp'],   
                'Debut questionnaire'                           => $this->request->getPost('datecollecte_deb'), 
                'Fin questionnaire'                             => $this->request->getPost('datecollecte_fin'), 
                'Zone d\'implantation de l\'entreprise/établissement'  => $B8 == 1 ? 'Zone industrielle' : ($B8 == 2 ? 'Marché':($B8 == 3 ? 'Centre commercial':($B8 == 4 ? 'Zone portuaire':($B8 == 5 ? 'Autre zone':'')))),
                'Si votre entreprise/établissement est dans un centre commercial ou dans un marché, zone industrielle veuillez préciser le nom '     => $this->request->getPost('B8a'),
                'Latitude'          => $this->request->getPost('B8b_2'),
                'Longitude'         => $this->request->getPost('B8b_1'),
                'Precision'         => $this->request->getPost('B8b_3'),
                'Numéro du bâtiment'                  => $this->request->getPost('B8c1'),
                'Numéro séquentiel de l’entreprise/établissement dans le bâtiment'                      => $this->request->getPost('B8c2'), 
                'Adresse géographique précise de l’entreprise (quartier, rue, etc.)'                    => $this->request->getPost('B9'), 
                'Votre entreprise dispose-t-elle d’un numéro de Registre de Commerce ?'                 => $this->request->getPost('F01') == 1 ? 'Oui':'Non',
                'Si oui donnez le numéro du registre de commerce'                                       => $this->request->getPost('F01a'),
                'Votre entreprise dispose-t-elle d’un numéro de compte contribuable ?'                  => $this->request->getPost('F02')  == 1 ? 'Oui':'Non',
                'Si oui donnez le numéro'                                                               => $this->request->getPost('F02a') ,
                'Votre entreprise tient-elle, une comptabilité formelle écrite ?'                       => $this->request->getPost('F03') == 1 ? 'Oui':'Non',
                'Votre entreprise produit -elle un document comptable en fin d’exercice ?'              => $this->request->getPost('F04') == 1 ? 'Oui':'Non',
                'Votre structure est-elle une Organisation Non gouvernemental (ONG), Association ou une Institution sans but lucratif (ONG, Associations etc.)?'                   => $this->request->getPost('F05') == 1 ? 'Oui':'Non',
                'Nom du répondant'                                              => $this->request->getPost('C1'),
                'Fonction du répondant'                                         => $this->request->getPost('C2'), 
                'Contact 1 du répondant'                                        => $this->request->getPost('C3a_1'),
                'Contact 2 du répondant'                                        => $this->request->getPost('C3a_2'),
                'E-mail du répondant'                                           => $this->request->getPost('C3a'),
                'Dénomination ou Raison sociale de l’entreprise/établissement'  => $this->request->getPost('C4'),
                'Sigle de l’entreprise/établissement'                           => $this->request->getPost('C5'),
                'Téléphone 1 (s) fixe(s)'                                       => $this->request->getPost('C6_1'),
                'Téléphone 2 (s) fixe(s)'                                       => $this->request->getPost('C6_2'), 
                'E-mail de l’entreprise'                                        => $this->request->getPost('C8'),
                'Site web de l’entreprise'                                      => $this->request->getPost('C9'),
                'Mois de création'                                              => $this->request->getPost('C10m'),
                'Année de création'                                             => $this->request->getPost('C10a'),
                'Mois de début d’exploitation'                                  => $this->request->getPost('C11m'),
                'Année de début d’exploitation'                                 => $this->request->getPost('C11a'),
                'Quelle est votre activité principale actuelle ?'               => $this->request->getPost('C12'),
                'Quel est le type d\'activité réalisée dans ce local ?'         => $valueC12b,
                'Autre à préciser'                                              => $this->request->getPost('C12b_37'),
                'Avez-vous des activités secondaires ?'                         => $this->request->getPost('C13') == 1 ? 'Oui':'Non',
                'Votre entreprise est-elle déclarée à la CNPS ? '               => $this->request->getPost('C16') == 1 ? 'Oui':'Non', 
                'Quel est l’état d’activité de l\'entreprise ?'                 => $this->request->getPost('C17') == 1 ? 'Activité non encore démarrée' : (
                  $this->request->getPost('C17') == 2 ? 'En activité' :( $this->request->getPost('C17') == 3 ? 'En veille ou en cessation momentanée' : ($this->request->getPost('C17') == 4 ? 'Cessation totale d’activité': '' ))),
                'Quelle est la forme juridique de votre entreprise ?'                   => $valueC18,
                'Autre forme juridique de votre entreprise'                             => $this->request->getPost('C18_11'),
                'Votre entreprise est-elle majoritairement (Plus de 50%) à capitaux'    => $valueC19,
                'Quel est le statut de votre structure ?'                               => $this->request->getPost('C20') == 1 ? "Siège" : ($this->request->getPost('C20') == 2 ? "Établissement" :""),
                'En dehors du siège, Combien d’établissements avez-vous ?'              => $this->request->getPost('C20a'),
                'Nom ou raison sociale du siège'                                        => $this->request->getPost('C20b_1'),
                'Adresse géographique'                                                  => $this->request->getPost('C20b_2'),
                'Ville / Localité'                                                      => $this->request->getPost('C20b_3'),
                'Nom et Prénoms du dirigeant ou gestionnaire'                           => $this->request->getPost('C21'),
                'Sexe'                                                                  => $this->request->getPost('C21_1') == 1 ? 'Masculin' :'Féminin',
                'Age'                                                                   => $this->request->getPost('C21_2'),
                'Qualité'                                                               => $valueC21_3,
                'Autre Qualité'              => $this->request->getPost('C21_3_6') ,
                'Votre entreprise dispose-t-elle d’une connexion internet ?'                   => $this->request->getPost('C22') == 1 ? 'Oui':'Non',
                'Quel est l’effectif total employé à ce jour ?'                  => $this->request->getPost('C23a'),
                'Quel est l’effectif de femmes employé à ce jour ?'                  => $this->request->getPost('C23b'),
                'Quel est l’effectif d’hommes employé à ce jour ?'                  => $this->request->getPost('C23c'),
                'A quelle tranche appartient votre chiffre d’affaires en 2024 ?'                   => $valueC24,
                'Libelle Autres à préciser'               => $this->request->getPost('E1t_autre'),
              
                'Fréquence, caractéristique de l’activité réalisée ?'                   => $valueC25,
                'Autre Fréquence, caractéristique de l’activité réalisée'                  => $this->request->getPost('C25_6'),
                'Votre entreprise dispose-t-elle de clients ou fournisseurs hors de la Côte d’Ivoire ?'                   => $this->request->getPost('C26') == 1 ? 'Oui':'Non',
            ];
            foreach ($valuee1 as $key => $colonne) {
                $dataPDF[$colonne] = 'Coché';
            }
            // Activités secondaires
            $dataPDFAs = [];
            foreach ($this->request->getPost('C13a_AS') as $key => $as) {
                $dataPDFAs['Activité ' . ($key + 1)] = $as;
            } 
            $dataPDF["Activités secondaire"] = $dataPDFAs;
            // Etablissements
            $dataPDFEt = [];
            $etablissements = $this->request->getPost('nom_etablissement');
            $adresses = $this->request->getPost('adresse');
            $localites = $this->request->getPost('localite');
            $contacts = $this->request->getPost('contact');

            foreach ($etablissements as $key => $et) {
                $dataPDFEt[$key] = [ 
                    'raisonsocial'          => $et,
                    'adressegeo'            => $adresses[$key],
                    'localiteetab'          => $localites[$key],  
                    'contact'               => $contacts[$key], 
                
                ]; 
            }
            $dataPDF["Etablissements"] = $dataPDFEt;
            return $this->response->setJSON([
                'status'  => 'success',
                'message' => 'Questionnaire enregistré avec succès. Vous pouvez télécharger vos reponses via le bouton ci-dessous !',
                'data' =>  $dataPDF
            ]);
        
    }

     public function storeSave()
    {

        try {
            $db = db_connect();
            $DatargeciModel = new \App\Models\DatargeciModel();
            $DatargeciAsModel = new \App\Models\DatargeciAsModel();
            $DatargeciEtModel = new \App\Models\DatargeciEtModel();

            $api = new AnstatApi();
            $getOneDistrict = $api->getOneDistrict($this->request->getPost('B1'));
            $getOneRegion = $api->getOneRegion($this->request->getPost('B2'));
            $getOneDept = $api->getOneDept($this->request->getPost('B3'));
            $getOneSp = $api->getOneSp($this->request->getPost('B3'),$this->request->getPost('B4_1'));
            $getOneLoc = $api->getOneLoc($this->request->getPost('B7a'),$this->request->getPost('B3'),$this->request->getPost('B4_1'));
            $now = Time::now();
            $ordreE1 =  $this->request->getPost('ordreE1');
            $valeurs = explode(',', $ordreE1);
            $datargeci = [
                'code_district'         => $this->request->getPost('B1'),
                'district'                => $getOneDistrict['nom_district'],
                'code_reg'              => $this->request->getPost('B2'),
                'region'                => $getOneRegion['nom_reg'],
                'code_dept'             => $this->request->getPost('B3'),
                'dept'                  => $getOneDept['nom_dep'],
                'code_sp'               => $this->request->getPost('B4_1'),
                'sousp'                 => $getOneSp['nom_sp'],
                'code_loc'              => $this->request->getPost('B7a'),
                'loc'                   => $getOneLoc['nom_loc'],
                'code_quartier'         => null,
                'quartier'              => $this->request->getPost('B7b'),
                'code_ilot'             => null,
                'code_zr'               => null,
                'milieu'                => $this->request->getPost('B5'),
                'datecollecte_deb'      => $now->toDateTimeString(),
                'datecollecte_fin'      => $now->toDateTimeString(),
                'b8'                    => $this->request->getPost('B8'),
                'b8aut'                 => null,
                'b8a'                   => $this->request->getPost('B8a'),
                'b8b_latitude'          => $this->request->getPost('B8b_2'),
                'b8b_longitude'         => $this->request->getPost('B8b_1'),
                'b8b_precision'         => $this->request->getPost('B8b_3'),
                'b8c1'                  => $this->request->getPost('B8c1'),
                'b8c2'                  => $this->request->getPost('B8c2'),
                'b8c3_latitude'         => $this->request->getPost('B8c3_2'),
                'b8c3_longitude'        => $this->request->getPost('B8c3_1'),
                'b8c3_precision'        => $this->request->getPost('B8c3_3'),
                'b9'                    => $this->request->getPost('B9'),
                'b10'                   => null,
                'f01'                   => $this->request->getPost('F01'),
                'f01a'                  => $this->request->getPost('F01a'),
                'f02'                   => $this->request->getPost('F02'),
                'f02a'                  => $this->request->getPost('F02a'),
                'f03'                   => $this->request->getPost('F03'),
                'f04'                   => $this->request->getPost('F04'),
                'f05'                   => $this->request->getPost('F05'),
                'c1'                    => $this->request->getPost('C1'),
                'c2'                    => $this->request->getPost('C2'),
                'c2_aut'                => null,
                'c3a1'                  => $this->request->getPost('C3a_1'),
                'c3a2'                  => $this->request->getPost('C3a_2'),
                'c3b'                   => $this->request->getPost('C3a'),
                'c4'                    => $this->request->getPost('C4'),
                'c5'                    => $this->request->getPost('C5'),
                'c6a'                   => $this->request->getPost('C6_1'),
                'c6b'                   => $this->request->getPost('C6_2'),
                'c7a'                   => null,
                'c7b'                   => null,
                'c8'                    => $this->request->getPost('C8'),
                'c9'                    => $this->request->getPost('C9'),
                'c10m'                  => $this->request->getPost('C10m'),
                'c10a'                  => $this->request->getPost('C10a'),
                'c11m'                  => $this->request->getPost('C11m'),
                'c11a'                  => $this->request->getPost('C11a'),
                'c12'                   => $this->request->getPost('C12'),
                'c12b'                  => $this->request->getPost('C12b'),
                'c12b_aut'              => $this->request->getPost('C12b_37'),
                'c13'                   => $this->request->getPost('C13'),
                'c16'                   => $this->request->getPost('C16'),
                'c16b'                  => null,
                'c17'                   => $this->request->getPost('C17'),
                'c18'                   => $this->request->getPost('C18'),
                'c18_aut'               => $this->request->getPost('C18_11'),
                'c19'                   => $this->request->getPost('C19'),
                'c20'                   => $this->request->getPost('C20'),
                'c20a'                  => $this->request->getPost('C20a'),
                'c20b1'                 => $this->request->getPost('C20b_1'),
                'c20b2'                 => $this->request->getPost('C20b_2'),
                'c20b3'                 => $this->request->getPost('C20b_3'),
                'c21a'                  => $this->request->getPost('C21'),
                'c21b'                  => $this->request->getPost('C21_1'),
                'c21c'                  => $this->request->getPost('C21_2'),
                'c21d'                  => $this->request->getPost('C21_3'),
                'c21d_aut'              => $this->request->getPost('C21_3_6') ,
                'c22'                   => $this->request->getPost('C22'),
                'c23a'                  => $this->request->getPost('C23a'),
                'c23b'                  => $this->request->getPost('C23b'),
                'c23c'                  => $this->request->getPost('C23c'),
                'c24'                   => $this->request->getPost('C24'),
                'e1t_aut'               => $this->request->getPost('E1t_autre'),
                'e2'                    => null,
                'r4'                    => null,
                'code_agent'            => null,
                'code_equipe'           => null,
                'status'                => null,
                'type_enregistrement'   => null,
                'is_rejet'              => null,
                'is_valide'             => null, 
                'commentaire'           => null,
                'e1u'                   => 0,
                'e1v'                   => 0,
                'motif_rejet'           => null,
                'c25'                   => $this->request->getPost('C25'),
                'c25a'                  => $this->request->getPost('C25_6'),
                'c26'                   => $this->request->getPost('C26'),
                'code_ent'              => null,
                'e1w'                   => 0,
                'e1y'                   => 0,
                'e1z'                   => 0,
                'inserted_date'         => $now->toDateTimeString(),
                'updated_date'          => $now->toDateTimeString(),
                'valid_codif'           => 0,
                'valid_codif_1'         => 0,
                'c20b4'                 => null

            ];
            foreach ($valeurs as $key => $colonne) {
                $datargeci[$colonne] = $key+1;
            }
            if ($DatargeciModel->insert($datargeci)) {
            }
            foreach ($this->request->getPost('C13a_AS') as $as) {
                $datargeciAs = [
                    'idUE'                  => $DatargeciModel->getInsertID(),
                    'code_district'         => $this->request->getPost('B1'),
                    'district'                => $getOneDistrict['nom_district'],
                    'code_reg'              => $this->request->getPost('B2'),
                    'region'                => $getOneRegion['nom_reg'],
                    'code_dept'             => $this->request->getPost('B3'),
                    'dept'                  => $getOneDept['nom_dep'],
                    'code_sp'               => $this->request->getPost('B4_1'),
                    'sousp'                 => $getOneSp['nom_sp'],
                    'code_loc'              => $this->request->getPost('B7a'),
                    'loc'                   => $getOneLoc['nom_loc'],
                    'code_quartier'         => null,
                    'quartier'              => $this->request->getPost('B7b'),
                    'code_ilot'             => null,
                    'code_zr'               => null,
                    'milieu'                => $this->request->getPost('B5'),
                    'c13a'                  => $as,
                    'code_agent'            => null,
                    'code_equipe'           => null,
                    'status'                => null,
                    'code_ent'              => null,
                    'inserted_date'         => $now->toDateTimeString(),
                    'updated_date'          => $now->toDateTimeString(),
                    'valid_codif'           => 0,
                    'valid_codif_1'         => 0
                ];
                $DatargeciAsModel->insert($datargeciAs);
            }
            $etablissements = $this->request->getPost('nom_etablissement');
            $adresses = $this->request->getPost('adresse');
            $localites = $this->request->getPost('localite');
            $contacts = $this->request->getPost('contact');

            foreach ($etablissements as $key => $et) {
                $datargeciEt = [
                    'idUE'                  => $DatargeciModel->getInsertID(),
                    'code_reg'              => $this->request->getPost('B2'),
                    'region'                => $getOneRegion['nom_reg'],
                    'code_dept'             => $this->request->getPost('B3'),
                    'dept'                  => $getOneDept['nom_dep'],
                    'code_sp'               => $this->request->getPost('B4_1'),
                    'sousp'                 => $getOneSp['nom_sp'],
                    'code_loc'              => $this->request->getPost('B7a'),
                    'loc'                   => $getOneLoc['nom_loc'],
                    'code_quartier'         => null,
                    'quartier'              => $this->request->getPost('B7b'),
                    'code_ilot'             => null,
                    'code_zr'               => null,
                    'milieu'                => $this->request->getPost('B5'),
                    'raisonsocial'          => $et,
                    'adressegeo'            => $adresses[$key],
                    'localiteetab'          => $localites[$key],
                    'code_agent'            => null,
                    'code_equipe'           => null,
                    'status'                => null,
                    'code_district'         => $this->request->getPost('B1'),
                    'district'              => $getOneDistrict['nom_district'],
                    'contact'               => $contacts[$key],
                    'code_ent'              => null,
                    'inserted_date'         => $now->toDateTimeString(),
                    'updated_date'          => $now->toDateTimeString(),
                    'valid_codif'           => 0,
                    'valid_codif_1'         => 0
                ];

                $DatargeciEtModel->insert($datargeciEt);
            }
            return $this->response->setJSON([
                'status'  => 'success',
                'message' => 'Questionnaire enregistré avec succès !'
            ]);
            return redirect()->route('home')->with('status_text', 'RGEECI !')->with('status_icon', 'success')->with('status', 'Questionnaire validé avec succès');
        } catch (DatabaseException $e) { 
            if (isset($transaction) && $transaction === true) {
                $db->transRollback();
            }
            return redirect()->route('home')->with('status_text', 'RGEECI !')->with('status_icon', 'error')->with('status', 'Échec de mise à jour.');
        }
    }

     public function templateQuestionnaire()
    { 
        $excelFilePath = FCPATH . 'template/QUESTIONNAIRE_RGEE.pdf';
        if (file_exists($excelFilePath)) { 
            $downloadFileName = 'QUESTIONNAIRE_RGEE.pdf';  
            return $this->response->download($excelFilePath, null)->setFileName($downloadFileName);
        } else { 
            return redirect()->back()->with('status_text', 'RGEECI !')->with('status_icon', 'error')->with('status', 'Echec  téléchargement du fichier');
        }
    }
}
