<?php
require_once __DIR__ . '/../models/Dossier.php';
require_once __DIR__ . '/../models/Patient.php';
require_once __DIR__ . '/../models/Medecin.php';
class DossierController {
    private $model;
    private $patientModel;
    private $medModel;
    public function __construct($mysqli){
        $this->model = new Dossier($mysqli);
        $this->patientModel = new Patient($mysqli);
        $this->medModel = new Medecin($mysqli);
    }
    public function index(){ $dossiers = $this->model->all(); require_once __DIR__ . '/../views/dossiers_list.php'; }
    public function create(){ $patients = $this->patientModel->all(); $medecins = $this->medModel->all(); require_once __DIR__ . '/../views/dossier_form.php'; }
    public function store(){ $this->model->create($_POST); header("Location: index.php?action=dossiers"); exit; }
    public function edit(){ $id = $_GET['id'] ?? null; $dossier = $this->model->find($id); $patients = $this->patientModel->all(); $medecins = $this->medModel->all(); require_once __DIR__ . '/../views/dossier_form.php'; }
    public function update(){ $id = $_POST['id_dossier']; $this->model->update($id,$_POST); header("Location: index.php?action=dossiers"); exit; }
    public function delete(){ $id = $_GET['id'] ?? null; $this->model->delete($id); header("Location: index.php?action=dossiers"); exit; }
}
