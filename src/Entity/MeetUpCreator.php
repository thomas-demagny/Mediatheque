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
    private ?int $id;

    /**
     * @ORM\ManyToOne(targetEntity=Creator::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private ?Creator $guest;

    /**
     * @ORM\ManyToOne(targetEntity=MeetUp::class)
     * @ORM\JoinColumn(nullable=true)
     */
    private ?MeetUp $meetUp;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Creator|null
     */
    public function getGuest(): ?Creator
    {
        return $this->guest;
    }

    /**
     * @param Creator|null $guest
     * @return $this
     */
    public function setGuest(?Creator $guest): self
    {
        $this->guest = $guest;

        return $this;
    }

    /**
     * @return MeetUp|null
     */
    public function getMeetUp(): ?MeetUp
    {
        return $this->meetUp;
    }

    /**
     * @param MeetUp|null $meetUp
     * @return $this
     */
    public function setMeetUp(?MeetUp $meetUp): self
    {
        $this->meetUp = $meetUp;

        return $this;
    }
}
