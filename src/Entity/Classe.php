<?php

namespace App\Entity;

use App\Repository\ClasseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use PhpParser\Node\Scalar\String_;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClasseRepository", repositoryClass=ClasseRepository::class)
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

    /**
     * @ORM\OneToMany(targetEntity=Student::class, mappedBy="classroom", cascade={"all"}, orphanRemoval=true )
     */
    private $students;

    public function __construct()
    {
        $this->students = new ArrayCollection();
    }

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

    /**
     * @return Collection|Student[]
     */
    public function getStudents(): Collection
    {
        return $this->students;
    }

    public function addStudent(Student $student): self
    {
        if (!$this->students->contains($student)) {
            $this->students[] = $student;
            $student->setClassroom($this);
        }
        return $this;
    }

    public function removeStudent(Student $student): self
    {
        if ($this->students->contains($student)) {
            $this->students->removeElement($student);
            // set the owning side to null (unless already changed)
            if ($student->getClassroom() === $this) {
                $student->setClassroom(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return  $this->getRef() . "";
    }


}
