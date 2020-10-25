<?php

namespace App\Entity;

use App\Repository\ClasseRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClasseRepository::class)
 */
class Classe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $ref;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    public function getRef(): ?int
    {
        return $this->ref;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }
}
