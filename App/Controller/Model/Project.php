<?php

namespace App\Model;

use Mithridatem\Validation\Attributes\NotBlank;
use Mithridatem\Validation\Attributes\Length;

class Project
{
    private ?int $id;
    #[NotBlank]
    #[Length(min:2, max:50)]
    private ?string $name;
    #[NotBlank]
    #[Length(min:2, max:50)]
    private ?string $folder;
    #[NotBlank]
    #[Length(min:2, max:50)]
    private ?string $file;

    public function __construct()
    {

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
    //=================== name ==================//
    public function getName(): ?string
    {
        return $this->name;
    }
    public function setName(?string $name): void
    {
        $this->name = $name;
    }
    //=================== folder ==================//
    public function getFolder(): ?string
    {
        return $this->folder;
    }
    public function setFolder(?string $folder): void
    {
        $this->folder = $folder;
    }
    //=================== file ==================//
    public function getFile(): ?string
    {
        return $this->file;
    }
    public function setFile(?string $file): void
    {
        $this->file = $file;
    }
}