<?php

namespace App\Entity;

use App\Repository\ParticipatesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ParticipatesRepository::class)
 */
class Participates extends User
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
     * @ORM\ManyToOne(targetEntity=MeetUp::class, inversedBy="participates")
     * @ORM\JoinColumn(nullable=false)
     */
    private ?MeetUp $meetUp;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $bookingPlaces;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $availablePlaces;

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

    public function getBookingPlaces(): ?int
    {
        return $this->bookingPlaces;
    }

    public function setBookingPlaces(int $bookingPlaces): self
    {
        $this->bookingPlaces = $bookingPlaces;

        return $this;
    }

    public function getAvailablePlaces(): ?int
    {
        return $this->availablePlaces;
    }

    public function setAvailablePlaces(int $availablePlaces): self
    {
        $this->availablePlaces = $availablePlaces;

        return $this;
    }
}
