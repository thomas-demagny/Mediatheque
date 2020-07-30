<?php

namespace App\Entity;

use App\Repository\ParticipatesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ParticipatesRepository::class)
 */
class Participates
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected ?int $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     */
    private ?User $person;

    /**
     * @ORM\ManyToOne(targetEntity=MeetUp::class)
     */
    private ?MeetUp $meetUp;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPerson(): ?User
    {
        return $this->person;
    }

    public function setPerson(?User $person): self
    {
        $this->person = $person;

        return $this;
    }

    public function getMeetUp(): ?MeetUp
    {
        return $this->meetUp;
    }

    public function setMeetUp(?MeetUp $meetUp): self
    {
        $this->meetUp = $meetUp;

        return $this;
    }
}
