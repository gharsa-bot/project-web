<?php
class Medecin {
    private $db;
    public function __construct($mysqli){ $this->db = $mysqli; }

    public function all(){ $res=$this->db->query("SELECT * FROM medecin"); return $res?$res->fetch_all(MYSQLI_ASSOC):[]; }
    public function find($id){ $id=(int)$id; $res=$this->db->query("SELECT * FROM medecin WHERE id_medecin=$id LIMIT 1"); return $res?$res->fetch_assoc():null; }
    public function create($d){
        $nom=$this->db->real_escape_string($d['nom']); $prenom=$this->db->real_escape_string($d['prenom']);
        $specialite=$this->db->real_escape_string($d['specialite']); $telephone=(int)$d['telephone']; $mail=$this->db->real_escape_string($d['mail']);
        return $this->db->query("INSERT INTO medecin (nom,prenom,specialite,telephone,mail) VALUES ('$nom','$prenom','$specialite',$telephone,'$mail')");
    }
    public function update($id,$d){
        $id=(int)$id; $nom=$this->db->real_escape_string($d['nom']); $prenom=$this->db->real_escape_string($d['prenom']);
        $specialite=$this->db->real_escape_string($d['specialite']); $telephone=(int)$d['telephone']; $mail=$this->db->real_escape_string($d['mail']);
        return $this->db->query("UPDATE medecin SET nom='$nom',prenom='$prenom',specialite='$specialite',telephone=$telephone,mail='$mail' WHERE id_medecin=$id");
    }
    public function delete($id){ $id=(int)$id; return $this->db->query("DELETE FROM medecin WHERE id_medecin=$id"); }
}
