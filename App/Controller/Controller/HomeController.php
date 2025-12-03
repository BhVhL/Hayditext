<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Utils\Tools;
use App\Service\EmailService;

class HomeController extends AbstractController
{
    private EmailService $emailService;

    public function __construct()
    {
        $this->emailService = new EmailService();
    }

    /**
     * Méthode pour afficher la page d'acceuil
     * @return mixed Retoune le template
     */
    public function index(): mixed
    {
        $data = [];

        if (isset($_POST["submit"])) {
            if (isset($_FILES["fichier"])) {
                $newname = $this->uploadFile("fichier", "img", ["png", "jpeg", "bmp"]);
                if (newname === false) {
                    $data["error"] = "Le format de fichier est invalide";
                } else {
                    $data["valid"] = "Le fichier " . $newname . " à été ajouté";
                }
            }
        }
        return $this->render("home", "acceuil", $data);
    }
}