<?php

class InstructeurModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getInstructeurs()
    {
        $sql = "SELECT * FROM Instructeur ORDER BY AantalSterren DESC";

        $this->db->query($sql);

        return $this->db->resultFetch();
    }

    public function getInstructeurById($id)
    {
        $sql = "SELECT * FROM Instructeur WHERE id = :id";

        $this->db->query($sql);
        $this->db->bindValue(":id", $id);

        return $this->db->result();
    }

    public function getVoertuigenByInstructeurId($id)
    {
        $sql = "SELECT * FROM VoertuigInstructeur a
        JOIN Voertuig b ON a.VoertuigId = b.Id
        JOIN TypeVoertuig c ON b.TypeVoertuigId = c.Id
        WHERE a.InstructeurId = :id";

        $this->db->query($sql);
        $this->db->bindValue(":id", $id);

        return $this->db->resultFetch();
    }

    public function getUnassignedVoertuigen()
    {
        $sql = "SELECT * FROM VoertuigInstructeur a
        LEFT JOIN Voertuig b ON a.VoertuigId = b.Id
        LEFT JOIN TypeVoertuig c ON b.TypeVoertuigId = c.Id";

        $this->db->query($sql);

        return $this->db->resultFetch();
    }

    public function insertVoertuig($instructeurId, $voertuigId)
    {
        $sql = "INSERT INTO VoertuigInstructeur
        (VoertuigId, InstructeurId, DatumToekenning, DatumAangemaakt, DatumGewijzigd)
        VALUES
        (:voertuigId, :instructeurId, now(), now(), now())";

        $this->db->query($sql);
        $this->db->bindValue(":voertuigId", $voertuigId);
        $this->db->bindValue(":instructeurId", $instructeurId);

        return $this->db->resultFetch();
    }

    public function update($voertuigId, $instructeurId)
    {
        $sql = "SELECT * FROM VoertuigInstructeur a
        LEFT JOIN Voertuig b ON a.VoertuigId = b.Id
        LEFT JOIN TypeVoertuig c ON b.TypeVoertuigId = c.Id
        
         where VoertuigId = $voertuigId and InstructeurId = $instructeurId"  ;

        $this->db->query($sql);

        return $this->db->resultFetch();
    }

    public function allUpdatedResults()
    {
        $sql = "SELECT * FROM VoertuigInstructeur a
        LEFT JOIN Voertuig b ON a.VoertuigId = b.Id
        LEFT JOIN TypeVoertuig c ON b.TypeVoertuigId = c.Id";

        $this->db->query($sql);

        return $this->db->resultFetch();
    }

    public function delete($voertuigId, $instructeurId)
    {
        $sql = "DELETE FROM VoertuigInstructeur
        WHERE VoertuigId = $voertuigId AND InstructeurId = $instructeurId";

        $this->db->query($sql);

        $this->db->query($sql);

        return $this->db->resultFetch();
    }

}
