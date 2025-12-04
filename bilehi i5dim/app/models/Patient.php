<?php
class Patient {
    private $db;
    public function __construct($mysqli){ $this->db = $mysqli; }

    public function all(){
        $res = $this->db->query("SELECT * FROM patient");
        return $res ? $res->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function find($id){
        $id = (int)$id;
        $res = $this->db->query("SELECT * FROM patient WHERE id_patient=$id LIMIT 1");
        return $res ? $res->fetch_assoc() : null;
    }

    public function create($data){
        $nom = $this->db->real_escape_string($data['nom']);
        $prenom = $this->db->real_escape_string($data['prenom']);
        $date_naissance = $this->db->real_escape_string($data['date_naissance']);
        $adresse = $this->db->real_escape_string($data['adresse']);
        $telephone = (int)$data['telephone'];
        $mail = $this->db->real_escape_string($data['mail']);
        $sql = "INSERT INTO patient (nom,prenom,date_naissance,adresse,telephone,mail)
                VALUES ('$nom','$prenom','$date_naissance','$adresse',$telephone,'$mail')";
        return $this->db->query($sql);
    }

    public function update($id, $data){
        $id = (int)$id;
        $nom = $this->db->real_escape_string($data['nom']);
        $prenom = $this->db->real_escape_string($data['prenom']);
        $date_naissance = $this->db->real_escape_string($data['date_naissance']);
        $adresse = $this->db->real_escape_string($data['adresse']);
        $telephone = (int)$data['telephone'];
        $mail = $this->db->real_escape_string($data['mail']);
        $sql = "UPDATE patient SET nom='$nom', prenom='$prenom', date_naissance='$date_naissance', adresse='$adresse', telephone=$telephone, mail='$mail' WHERE id_patient=$id";
        return $this->db->query($sql);
    }

    public function delete($id){
        $id = (int)$id;
        return $this->db->query("DELETE FROM patient WHERE id_patient=$id");
    }
}
