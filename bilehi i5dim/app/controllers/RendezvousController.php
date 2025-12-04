<?php
require_once __DIR__ . '/../models/Rendezvous.php';
require_once __DIR__ . '/../models/Medecin.php';
require_once __DIR__ . '/../models/Secretaire.php';
class RendezvousController {
    private $model;
    private $medModel;
    private $secModel;
    public function __construct($mysqli){
        $this->model = new Rendezvous($mysqli);
        $this->medModel = new Medecin($mysqli);
        $this->secModel = new Secretaire($mysqli);
    }
    public function index(){ $rendez = $this->model->all(); require_once __DIR__ . '/../views/rendezvous_list.php'; }
    public function create(){ $medecins = $this->medModel->all(); $secretaires = $this->secModel->all(); require_once __DIR__ . '/../views/rendezvous_form.php'; }
    public function store(){ $this->model->create($_POST); header("Location: index.php?action=rendezvous"); exit; }
    public function edit(){ $id = $_GET['id'] ?? null; $r = $this->model->find($id); $medecins = $this->medModel->all(); $secretaires = $this->secModel->all(); require_once __DIR__ . '/../views/rendezvous_form.php'; }
    public function update(){ $id = $_POST['id_rdv']; $this->model->update($id,$_POST); header("Location: index.php?action=rendezvous"); exit; }
    public function delete(){ $id = $_GET['id'] ?? null; $this->model->delete($id); header("Location: index.php?action=rendezvous"); exit; }
}
