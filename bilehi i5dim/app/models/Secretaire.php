<?php
class Secretaire {
    private $db;
    public function __construct($mysqli){ $this->db = $mysqli; }
    public function all(){ $res=$this->db->query("SELECT * FROM secretaire"); return $res?$res->fetch_all(MYSQLI_ASSOC):[]; }
    public function find($id){ $id=(int)$id; $res=$this->db->query("SELECT * FROM secretaire WHERE id_secretaire=$id LIMIT 1"); return $res?$res->fetch_assoc():null; }
    public function create($d){
        $nom=$this->db->real_escape_string($d['nom']); $prenom=$this->db->real_escape_string($d['prenom']);
        $telephone=(int)$d['telephone']; $mail=$this->db->real_escape_string($d['mail']);
        return $this->db->query("INSERT INTO secretaire (nom,prenom,telephone,mail) VALUES ('$nom','$prenom',$telephone,'$mail')");
    }
    public function update($id,$d){ $id=(int)$id; $nom=$this->db->real_escape_string($d['nom']); $prenom=$this->db->real_escape_string($d['prenom']);
        $telephone=(int)$d['telephone']; $mail=$this->db->real_escape_string($d['mail']);
        return $this->db->query("UPDATE secretaire SET nom='$nom',prenom='$prenom',telephone=$telephone,mail='$mail' WHERE id_secretaire=$id");
    }
    public function delete($id){ $id=(int)$id; return $this->db->query("DELETE FROM secretaire WHERE id_secretaire=$id"); }
}
