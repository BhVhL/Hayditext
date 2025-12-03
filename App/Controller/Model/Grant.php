<?php

namespace App\Model;

class Grant
{
    private ?int $id;
    private ?string $name;

    public function __construct(?String $name)
    {
        $this->name = $name;
    }

    //================== ID ==================//
    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(?int $id):void
    {
        $this->id = $id;
    }
    //================== NAME ==================//
    public function getName(): ?string
    {
        return $this->name;
    }
    public function setName(?string $name):void
    {
        $this->name = $name;
    }
}