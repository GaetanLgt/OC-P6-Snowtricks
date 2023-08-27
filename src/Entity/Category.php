<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\ManyToMany(targetEntity: Trick::class, inversedBy: 'categories')]
    private Collection $Tricks;

    public function __construct()
    {
        $this->Tricks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, Trick>
     */
    public function getTricks(): Collection
    {
        return $this->Tricks;
    }

    public function addTrick(Trick $trick): static
    {
        if (!$this->Tricks->contains($trick)) {
            $this->Tricks->add($trick);
        }

        return $this;
    }

    public function removeTrick(Trick $trick): static
    {
        $this->Tricks->removeElement($trick);

        return $this;
    }
}
