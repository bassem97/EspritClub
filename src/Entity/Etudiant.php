<?php

namespace App\Entity;

use App\Repository\EtudiantRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EtudiantRepository::class)
 */
class Etudiant
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $NCE;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Email;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNCE(): ?int
    {
        return $this->NCE;
    }

    public function setNCE(int $NCE): self
    {
        $this->NCE = $NCE;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(?string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }
}
