<?php

namespace App\Dto;

class MembreDto
{
    /**
     * @var string
     */
    private string $prenom;
    /**
     * @var string
     */
    private string $nom;
    /**
     * @var string
     */
    private string $email;
    /**
     * @var array
     */
    private array $contributions;

    /**
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     * @return MembreDto
     */
    public function setPrenom(string $prenom): MembreDto
    {
        $this->prenom = $prenom;
        return $this;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     * @return MembreDto
     */
    public function setNom(string $nom): MembreDto
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return MembreDto
     */
    public function setEmail(string $email): MembreDto
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return array
     */
    public function getContributions(): array
    {
        return $this->contributions;
    }

    /**
     * @param array $contributions
     * @return MembreDto
     */
    public function setContributions(array $contributions): MembreDto
    {
        $this->contributions = $contributions;
        return $this;
    }
}