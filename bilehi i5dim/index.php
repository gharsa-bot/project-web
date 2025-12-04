<?php
session_start();

// Connexion à la base
require_once __DIR__ . '/config/database.php';

// Chargement des modèles
require_once __DIR__ . '/app/models/User.php';
require_once __DIR__ . '/app/models/Patient.php';
require_once __DIR__ . '/app/models/Medecin.php';
require_once __DIR__ . '/app/models/Secretaire.php';
require_once __DIR__ . '/app/models/Rendezvous.php';
require_once __DIR__ . '/app/models/Dossier.php';

// Chargement des controllers
require_once __DIR__ . '/app/controllers/AuthController.php';
require_once __DIR__ . '/app/controllers/PatientController.php';
require_once __DIR__ . '/app/controllers/MedecinController.php';
require_once __DIR__ . '/app/controllers/SecretaireController.php';
require_once __DIR__ . '/app/controllers/RendezvousController.php';
require_once __DIR__ . '/app/controllers/DossierController.php';

// Instanciation des controllers
$auth = new AuthController($mysqli);
$patientCtrl = new PatientController($mysqli);
$medecinCtrl = new MedecinController($mysqli);
$secretaireCtrl = new SecretaireController($mysqli);
$rendezCtrl = new RendezvousController($mysqli);
$dossierCtrl = new DossierController($mysqli);

// Récupération de l'action
$action = $_GET['action'] ?? 'login';

// ROUTES POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch ($action) {
        case 'login': $auth->login(); break;
        case 'patient_create': $patientCtrl->store(); break;
        case 'patient_update': $patientCtrl->update(); break;
        case 'medecin_create': $medecinCtrl->store(); break;
        case 'medecin_update': $medecinCtrl->update(); break;
        case 'secretaire_create': $secretaireCtrl->store(); break;
        case 'secretaire_update': $secretaireCtrl->update(); break;
        case 'rendez_create': $rendezCtrl->store(); break;
        case 'rendez_update': $rendezCtrl->update(); break;
        case 'dossier_create': $dossierCtrl->store(); break;
        case 'dossier_update': $dossierCtrl->update(); break;
        default: $auth->showLogin(); break;
    }
    exit;
}

// ROUTES GET
switch ($action) {
    // Auth
    case 'login': $auth->showLogin(); break;
    case 'logout': $auth->logout(); break;

    // Dashboards
    case 'dashboard_patient': $auth->dashboard_patient(); break;
    case 'dashboard_medecin': $auth->dashboard_medecin(); break;
    case 'dashboard_secretaire': $auth->dashboard_secretaire(); break;
    case 'dashboard_admin': $auth->dashboard_admin(); break;

    // Patients
    case 'patients': $patientCtrl->index(); break;
    case 'patient_new': $patientCtrl->create(); break;
    case 'patient_edit': $patientCtrl->edit(); break;
    case 'patient_delete': $patientCtrl->delete(); break;

    // Médecins
    case 'medecins': $medecinCtrl->index(); break;
    case 'medecin_new': $medecinCtrl->create(); break;
    case 'medecin_edit': $medecinCtrl->edit(); break;
    case 'medecin_delete': $medecinCtrl->delete(); break;

    // Secrétaires
    case 'secretaires': $secretaireCtrl->index(); break;
    case 'secretaire_new': $secretaireCtrl->create(); break;
    case 'secretaire_edit': $secretaireCtrl->edit(); break;
    case 'secretaire_delete': $secretaireCtrl->delete(); break;

    // Rendez-vous
    case 'rendezvous': $rendezCtrl->index(); break;
    case 'rendez_new': $rendezCtrl->create(); break;
    case 'rendez_edit': $rendezCtrl->edit(); break;
    case 'rendez_delete': $rendezCtrl->delete(); break;

    // Dossiers
    case 'dossiers': $dossierCtrl->index(); break;
    case 'dossier_new': $dossierCtrl->create(); break;
    case 'dossier_edit': $dossierCtrl->edit(); break;
    case 'dossier_delete': $dossierCtrl->delete(); break;

    default: $auth->showLogin(); break;
}
