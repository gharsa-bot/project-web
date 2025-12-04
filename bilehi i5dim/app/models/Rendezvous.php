<?php
// app/models/Rendezvous.php

class Rendezvous {
    private $db;

    public function __construct($mysqli) {
        $this->db = $mysqli;
    }

    public function all() {
        $sql = "SELECT * FROM rendezvous";
        $res = $this->db->query($sql);
        return $res ? $res->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function find($id) {
        $id = (int) $id;
        $sql = "SELECT * FROM rendezvous WHERE id_rdv = $id LIMIT 1";
        $res = $this->db->query($sql);
        return $res ? $res->fetch_assoc() : null;
    }

    public function create($data) {
        $date = $this->db->real_escape_string($data['date_rdv'] ?? '');
        $heure = $this->db->real_escape_string($data['heure_rdv'] ?? '');
        $id_medecin = (int) ($data['id_medecin'] ?? 0);
        $id_secretaire = (int) ($data['id_secretaire'] ?? 0);
        $etat = $this->db->real_escape_string($data['etat'] ?? 'non payer');
        $montant = (int) ($data['montant'] ?? 0);

        $sql = "INSERT INTO rendezvous (date_rdv, heure_rdv, id_medecin, id_secretaire, etat, montant)
                VALUES ('$date', '$heure', $id_medecin, $id_secretaire, '$etat', $montant)";

        return $this->db->query($sql);
    }

    public function update($id, $data) {
        $id = (int) $id;
        $date = $this->db->real_escape_string($data['date_rdv'] ?? '');
        $heure = $this->db->real_escape_string($data['heure_rdv'] ?? '');
        $id_medecin = (int) ($data['id_medecin'] ?? 0);
        $id_secretaire = (int) ($data['id_secretaire'] ?? 0);
        $etat = $this->db->real_escape_string($data['etat'] ?? 'non payer');
        $montant = (int) ($data['montant'] ?? 0);

        $sql = "UPDATE rendezvous SET
                    date_rdv = '$date',
                    heure_rdv = '$heure',
                    id_medecin = $id_medecin,
                    id_secretaire = $id_secretaire,
                    etat = '$etat',
                    montant = $montant
                WHERE id_rdv = $id";

        return $this->db->query($sql);
    }

    public function delete($id) {
        $id = (int) $id;
        return $this->db->query("DELETE FROM rendezvous WHERE id_rdv = $id");
    }
}

