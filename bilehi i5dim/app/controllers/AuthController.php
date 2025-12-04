<?php
class AuthController {
    private $userModel;
    public function __construct($mysqli){
        require_once __DIR__ . '/../models/User.php';
        $this->userModel = new User($mysqli);
    }

    public function showLogin(){
        require_once __DIR__ . '/../views/login.php';
    }

    public function login(){
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        $user = $this->userModel->login($username, $password);
        if ($user) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            // redirect to role dashboard
            switch ($user['role']) {
                case 'medecin': header("Location: index.php?action=dashboard_medecin"); break;
                case 'secretaire': header("Location: index.php?action=dashboard_secretaire"); break;
                case 'admin': header("Location: index.php?action=dashboard_admin"); break;
                default: header("Location: index.php?action=dashboard_patient"); break;
            }
            exit;
        } else {
            $error = "Identifiants incorrects";
            require_once __DIR__ . '/../views/login.php';
        }
    }

    public function logout(){
        session_destroy();
        header("Location: index.php?action=login");
        exit;
    }

    public function dashboard_patient(){ require_once __DIR__ . '/../views/dashboard_patient.php'; }
    public function dashboard_medecin(){ require_once __DIR__ . '/../views/dashboard_medecin.php'; }
    public function dashboard_secretaire(){ require_once __DIR__ . '/../views/dashboard_secretaire.php'; }
    public function dashboard_admin(){ require_once __DIR__ . '/../views/dashboard_admin.php'; }
}
