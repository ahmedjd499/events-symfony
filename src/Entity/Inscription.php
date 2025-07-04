<?php

namespace App\Entity;

use App\Enum\EtatI;
use App\Repository\InscriptionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InscriptionRepository::class)]
class Inscription
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $dateI = null;

    #[ORM\Column(enumType: EtatI::class)]
    private ?EtatI $etatI = null;



    #[ORM\ManyToOne(inversedBy: 'inscriptions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Event $event = null;

    #[ORM\ManyToOne(inversedBy: 'inscriptions')]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateI(): ?\DateTime
    {
        return $this->dateI;
    }

    public function setDateI(?\DateTime $dateI): static
    {
        $this->dateI = $dateI;

        return $this;
    }

    public function getEtatI(): ?EtatI
    {
        return $this->etatI;
    }

    public function setEtatI(?EtatI $etatI): static
    {
        $this->etatI = $etatI;

        return $this;
    }

  
    public function getEvent(): ?Event
    {
        return $this->event;
    }

    public function setEvent(?Event $event): static
    {
        $this->event = $event;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }
}
