<?php

namespace App\Entity;

use App\Repository\ConferenceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConferenceRepository::class)]
class Conference
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $city = null;

    #[ORM\Column(length: 4)]
    private ?string $year = null;

    #[ORM\Column]
    private ?bool $isInternational = null;

    /**
     * @var Collection<int, Coment>
     */
    #[ORM\OneToMany(targetEntity: Coment::class, mappedBy: 'conference', orphanRemoval: true)]
    private Collection $commnents;

    public function __construct()
    {
        $this->commnents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getYear(): ?string
    {
        return $this->year;
    }

    public function setYear(string $year): static
    {
        $this->year = $year;

        return $this;
    }

    public function isInternational(): ?bool
    {
        return $this->isInternational;
    }

    public function setInternational(bool $isInternational): static
    {
        $this->isInternational = $isInternational;

        return $this;
    }

    /**
     * @return Collection<int, Coment>
     */
    public function getCommnents(): Collection
    {
        return $this->commnents;
    }

    public function addCommnent(Coment $commnent): static
    {
        if (!$this->commnents->contains($commnent)) {
            $this->commnents->add($commnent);
            $commnent->setConference($this);
        }

        return $this;
    }

    public function removeCommnent(Coment $commnent): static
    {
        if ($this->commnents->removeElement($commnent)) {
            // set the owning side to null (unless already changed)
            if ($commnent->getConference() === $this) {
                $commnent->setConference(null);
            }
        }

        return $this;
    }
}
