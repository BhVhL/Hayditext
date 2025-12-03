<?php

namespace App\Controller;



class RegisterController extends AbstractController
{
    private AccountRepository $accountRepository;
    private WorkRepository $workRepository;
    private Validator $validator;

    public function __construct()
    {
        $this->accountRepository = new AccountRepository();
    }

    public function addAccount(): mixed 
    {
        $data = [];
        if (isset($_POST["submit"])) {
            try {
                if (!empty($_POST["password"]) && !empty($_POST["confirm-password"])) {
                    if ($_POST["password"] === $_POST["confirm-password"]) {
                        if (!$this->accountRepository->isAccountExistsWithEmail($_POST["email"])) {
                            $account = new Account();
                            $account->setFirstname(Tools::sanitize($_POST["firstname"]));
                            $account->setPseudo(Tools::sanitize($_POST["pseudo"]));
                            $acount->setEmail(Tools::sanitize($_POST["email"]));

                            $this->validator->validate($account);

                            $hash = password_hash(Tools::sanitize($_POST["password"]), PASSWORD_DEFAULT);
                            $account->setPassword($hash);

                            $grant = new Grant("ROLE_USER");
                            $grant->setId(1);
                            $account->setGrant($grant);

                            $this->accountRepository->saveAccount($account);
                            $data["valid"] = "Le comtpe " . $account->getEmail() . " à été ajouté en BDD";
                            header("Location: '/");
                        }
                        else {
                            $data["error"]  = "Le compte existe déjà";
                        }
                    }
                    else {
                        $data["error"] = "Les mots de passe sont différents";
                    }
                }
                else {
                    $data["error"] = "Veuillez renseigner tous les champs du formulaire";
                }
            }
            catch(\PDOException $pdo) {
                $data["error"] = $pdo->getMessage();
            }
            catch(ValidationException $ve) {
                $data["error"] = $ve->getMessage();
            }
        }
        return $this->render("register_account", "Inscription", $data);
    }

    /**
     * Méthode pour se connecter
     * @return mixed include le template
     */
    public function login(): mixed
    {
        $data = [];
        if (isset($_POST["submit"])) {
            if (!empty($_POST["email"]) && !empty($_POST["password"])) {
                $email = Tools::sanitize($_POST["email"]);
                $password = Tools::sanitize($POST["password"]);

                $account= $this->accountRepository->findAccountByEmail($email);
                if ($account) {
                    if (password_verify($password, $account["password"])) {
                        $_SESSION["firstname"] = $account["firstname"];
                        $_SESSION["pseudo"] = $account["pseudo"];
                        $_SESSION["email"] = $account["email"];
                        $_SESSION["id"] = $account["id"];
                        $_SESSION["grant"] = $account["grant"];
                        $_SESSION["connected"] = true;
                        return header('Location: /');
                    }
                    else {
                        $data["error"] = "Les informations de connexion sont incorrectes";
                    }
                }
                else {
                    $data["error"] = "Les informations de connexion sont incorrectes";
                }
            }
            else {
                $data["error"] = "Veuillez renseigner tous les champs du formulaire";
            }
        }
        return $this->render("login", "Connexion", $data);
    }

    /**
     * Méthode pour se déconnecter
     * @return void
     */
    public function logout(): void
    {
        session_destroy();
        header('Location: /');
    }

    /**
     * Méthode pour créer un projet : Dossier["title"] -> Fichier["name"]
     * @return mixed include le template
     */
    public function addProjectToAccount(): mixed
    {
        $data = [];

        if (isset($_POST["submit"])) {
            if (isset($_POST["name"])) {
                $project = new Project();
                $project->setTitle(Tools::sanitize($_POST["name"]));
                $idAccount = $_SESSION["id"];

                if (!$this->accountRepository->isProjectToAccountExists($project, $idAccount)) {
                    $this->accountRepository->saveProjectToAccount($project, $idAccount);
                    $data["valid"] = "Le projet est bien créé";
                }
                else {
                    $data["error"] = "Le projet existe déjà en base de donnée";
                }
            }
        }
        $data["projects"] = $this->projectRepository->findAllProjects();
        return $this->render("add_project_to_account", "ajouté_un_projet_au_compte", $data);
    }
}