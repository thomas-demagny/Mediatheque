<?php

namespace App\Entity;

use App\Repository\MeetUpRepository;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MeetUpRepository::class)
 */
class MeetUp
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private ?int $id;
    
    /**
     * @ORM\Column(type="datetime")
     */
    private ?DateTimeInterface $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\ManyToOne(targetEntity=Employee::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $organizer;

    /**
     * @ORM\ManyToMany(targetEntity=Creator::class)
     */
    private $guests;

    /**
     * @ORM\Column(type="integer")
     */
    private $maxPlaces;

    /**
     * @ORM\Column(type="integer")
     */
    private $bookedPlaces;

    public function __construct()
    {
        $this->participates = new ArrayCollection();
        $this->guests = new ArrayCollection();
    }


    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param DateTimeInterface $date
     * @return $this
     */
    public function setDate(DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getOrganizer(): ?Employee
    {
        return $this->organizer;
    }

    public function setOrganizer(?Employee $organizer): self
    {
        $this->organizer = $organizer;

        return $this;
    }

    /**
     * @return Collection|Creator[]
     */
    public function getGuests(): Collection
    {
        return $this->guests;
    }

    public function addGuest(Creator $guest): self
    {
        if (!$this->guests->contains($guest)) {
            $this->guests[] = $guest;
        }

        return $this;
    }

    public function removeGuest(Creator $guest): self
    {
        if ($this->guests->contains($guest)) {
            $this->guests->removeElement($guest);
        }

        return $this;
    }

    public function getMaxPlaces(): ?int
    {
        return $this->maxPlaces;
    }

    public function setMaxPlaces(int $maxPlaces): self
    {
        $this->maxPlaces = $maxPlaces;

        return $this;
    }

    public function getBookedPlaces(): ?int
    {
        return $this->bookedPlaces;
    }

    public function setBookedPlaces(int $bookedPlaces): self
    {
        $this->bookedPlaces = $bookedPlaces;

        return $this;
    }


}
