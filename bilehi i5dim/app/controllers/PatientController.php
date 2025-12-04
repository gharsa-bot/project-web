<?php
require_once __DIR__ . '/../models/Patient.php';
class PatientController {
    private $model;
    public function __construct($mysqli){ $this->model = new Patient($mysqli); }

    public function index(){
        $patients = $this->model->all();
        require_once __DIR__ . '/../views/patients_list.php';
    }
    public function create(){
        require_once __DIR__ . '/../views/patient_form.php';
    }
    public function store(){
        $this->model->create($_POST);
        header("Location: index.php?action=patients"); exit;
    }
    public function edit(){
        $id = $_GET['id'] ?? null;
        $patient = $this->model->find($id);
        require_once __DIR__ . '/../views/patient_form.php';
    }
    public function update(){
        $id = $_POST['id_patient'];
        $this->model->update($id,$_POST);
        header("Location: index.php?action=patients"); exit;
    }
    public function delete(){
        $id = $_GET['id'] ?? null;
        $this->model->delete($id);
        header("Location: index.php?action=patients"); exit;
    }
}
