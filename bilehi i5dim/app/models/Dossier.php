<?php
class Dossier {
    private $db;

    public function __construct($mysqli){
        $this->db = $mysqli;
    }

    public function all(){
        $sql = "SELECT * FROM dossier";
        $res = $this->db->query($sql);
        return $res ? $res->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function find($id){
        $id = (int)$id;
        $sql = "SELECT * FROM dossier WHERE id_dossier = $id LIMIT 1";
        $res = $this->db->query($sql);
        return $res ? $res->fetch_assoc() : null;
    }

    public function create($data){
        $diagnostic = $this->db->real_escape_string($data['diagnostic']);
        $traitement = $this->db->real_escape_string($data['traitement']);
        $observation = $this->db->real_escape_string($data['observation']);
        $id_patient = (int)$data['id_patient'];
        $id_medecin = (int)$data['id_medecin'];

        $sql = "INSERT INTO dossier (diagnostic, traitement, observation, id_patient, id_medecin)
                VALUES ('$diagnostic', '$traitement', '$observation', $id_patient, $id_medecin)";

        return $this->db->query($sql);
    }

    public function update($id, $data){
        $id = (int)$id;
        $diagnostic = $this->db->real_escape_string($data['diagnostic']);
        $traitement = $this->db->real_escape_string($data['traitement']);
        $observation = $this->db->real_escape_string($data['observation']);
        $id_patient = (int)$data['id_patient'];
        $id_medecin = (int)$data['id_medecin'];

        $sql = "UPDATE dossier SET
                diagnostic = '$diagnostic',
                traitement = '$traitement',
                observation = '$observation',
                id_patient = $id_patient,
                id_medecin = $id_medecin
                WHERE id_dossier = $id";

        return $this->db->query($sql);
    }

    public function delete($id){
        $id = (int)$id;
        return $this->db->query("DELETE FROM dossier WHERE id_dossier = $id");
    }
}
