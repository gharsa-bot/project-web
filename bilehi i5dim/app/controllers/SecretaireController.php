<?php
require_once __DIR__ . '/../models/Secretaire.php';
class SecretaireController {
    private $model;
    public function __construct($mysqli){ $this->model = new Secretaire($mysqli); }
    public function index(){ $secretaires = $this->model->all(); require_once __DIR__ . '/../views/secretaires_list.php'; }
    public function create(){ require_once __DIR__ . '/../views/secretaire_form.php'; }
    public function store(){ $this->model->create($_POST); header("Location: index.php?action=secretaires"); exit; }
    public function edit(){ $id = $_GET['id'] ?? null; $secretaire = $this->model->find($id); require_once __DIR__ . '/../views/secretaire_form.php'; }
    public function update(){ $id = $_POST['id_secretaire']; $this->model->update($id,$_POST); header("Location: index.php?action=secretaires"); exit; }
    public function delete(){ $id = $_GET['id'] ?? null; $this->model->delete($id); header("Location: index.php?action=secretaires"); exit; }
}
