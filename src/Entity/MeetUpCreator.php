<?php

namespace App\Entity;

use App\Repository\MeetUpCreatorRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MeetUpCreatorRepository::class)
 */
class MeetUpCreator
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Creator::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $guest;

    /**
     * @ORM\ManyToOne(targetEntity=MeetUp::class)
     */
    private $meetUp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGuest(): ?Creator
    {
        return $this->guest;
    }

    public function setGuest(?Creator $guest): self
    {
        $this->guest = $guest;

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
