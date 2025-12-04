<?php
require_once __DIR__ . '/../models/Medecin.php';

class MedecinController {
    private $model;

    public function __construct($mysqli){
        $this->model = new Medecin($mysqli);
    }

    // Liste des médecins
    public function index(){
        $medecins = $this->model->all();
        // Inclusion sécurisée de la vue
        $view = realpath(__DIR__ . '/../views/medecins_list.php');
        if ($view && file_exists($view)) {
            require_once $view;
        } else {
            die("Erreur : Vue medecins_list.php introuvable !");
        }
    }

    // Formulaire création
    public function create(){
        $view = realpath(__DIR__ . '/../views/medecin_form.php');
        if ($view && file_exists($view)) {
            require_once $view;
        } else {
            die("Erreur : Vue medecin_form.php introuvable !");
        }
    }

    public function store(){
        $this->model->create($_POST);
        header("Location: index.php?action=medecins");
        exit;
    }

    // Formulaire modification
    public function edit(){
        $id = $_GET['id'] ?? null;
        $medecin = $this->model->find($id);
        $view = realpath(__DIR__ . '/../views/medecin_form.php');
        if ($view && file_exists($view)) {
            require_once $view;
        } else {
            die("Erreur : Vue medecin_form.php introuvable !");
        }
    }

    public function update(){
        $id = $_POST['id_medecin'];
        $this->model->update($id,$_POST);
        header("Location: index.php?action=medecins");
        exit;
    }

    public function delete(){
        $id = $_GET['id'] ?? null;
        $this->model->delete($id);
        header("Location: index.php?action=medecins");
        exit;
    }
}
