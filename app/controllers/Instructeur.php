<?php

class Instructeur extends BaseController
{
    private $instructeurModel;

    public function __construct()
    {
        $this->instructeurModel = $this->model('InstructeurModel');
    }

    public function index()
    {
        $result  = $this->instructeurModel->getInstructeurs();

        $data = [
            'title' => 'Instructeurs in dienst',
            'instructeurs' => $result,
        ];

        $this->view('Instructeur/index', $data);
    }

    public function gebruikteVoertuigen($id)
    {
        $instructeur  = $this->instructeurModel->getInstructeurById($id);
        $voertuigen = $this->instructeurModel->getVoertuigenByInstructeurId($id);

        $data = [
            'title' => 'Gebruikte voertuigen',
            'instructeur' => $instructeur,
            'voertuigen' => $voertuigen,
        ];

        $this->view('Instructeur/gebruikteVoertuigen', $data);
    }

    public function toevoegen($id)
    {
        $instructeur  = $this->instructeurModel->getInstructeurById($id);
        $voertuigen = $this->instructeurModel->getUnassignedVoertuigen($id);

        $data = [
            'title' => 'Toevoegen voertuig',
            'instructeur' => $instructeur,
            'voertuigen' => $voertuigen,
        ];

        $this->view('Instructeur/toevoegen', $data);
    }

    public function voegToe($instructeurId, $voertuigId)
    {
        $this->instructeurModel->insertVoertuig($instructeurId, $voertuigId);

        header("Refresh: 3; url=/instructeur/gebruikteVoertuigen/" . $instructeurId);
        echo "Voertuig toegevoegd.";
    }
}
