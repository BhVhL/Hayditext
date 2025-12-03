<?php 

namespace App\Model;

use App\Model\Grant;
use App\Model\Project;
use Mithridatem\Validation\Attributes\Length;
use Mithridatem\Validation\Attributes\NotBlank;
use Mithridatem\Validation\Attributes\Email;

class Account
{
    private ?int $id;
    private ?string $firstname;
    private ?string $pseudo;
    private ?string $email;
    private ?string $password;
    private ?string $grant;
    private array $projects;

    public function __construct()
    {
        $this->projects = [];
    }

    //=================== ID ==================//
    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(?int $id): void
    {
        $this->id = $id;
    }
    //=================== FIRSTNAME ==================//
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }
    public function setFirstname(?string $firstname): void
    {
        $this->firstname = $firstname;
    }
    //=================== PSEUDO ==================//
    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }
    public function setPseudo(?string $pseudo): void
    {
        $this->pseudo = $pseudo;
    }
    //=================== EMAIL ==================//
    public function getEmail(): ?string
    {
        return $this->email;
    }
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }
    //=================== PASSWORD ==================//
    public function getPassword(): ?string
    {
        return $this->password;
    }
    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }
    //=================== GRANT ==================//
    public function getGrant(): ?string
    {
        return $this->grant;
    }
    public function setGrant(?string $grant): void
    {
        $this->grant = $grant;
    }
    //=================== $PROJECTS ==================//
    public function getProjects(): array
    {
        return $this->projects;
    }
    public function addNewProject(Project $project): void
    {
        $this->projects[] = $project;
    }
    public function removeProject(Project $project):void
    {
        unset($this->projects[array_search($project, $this->projects)]);
        sort($this->projects);
    }
}