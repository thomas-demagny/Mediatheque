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
     * @ORM\ManyToMany(targetEntity=Product::class, inversedBy="guest")
     */
    private $subject;

    /**
     * @ORM\OneToMany(targetEntity=Participates::class, mappedBy="meetUp", orphanRemoval=true)
     */
    private ArrayCollection $participates;

    public function __construct()
    {
        $this->participates = new ArrayCollection();
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

    /**
     * @return Collection|Product[]
     */
    public function getSubject(): Collection
    {
        return $this->subject;
    }

    /**
     * @param Product $subject
     * @return $this
     */
    public function addSubject(Product $subject): self
    {
        if (!$this->subject->contains($subject)) {
            $this->subject[] = $subject;
        }

        return $this;
    }

    /**
     * @param Product $subject
     * @return $this
     */
    public function removeSubject(Product $subject): self
    {
        if ($this->subject->contains($subject)) {
            $this->subject->removeElement($subject);
        }

        return $this;
    }

    /**
     * @return Collection|Participates[]
     */
    public function getParticipates(): Collection
    {
        return $this->participates;
    }

    public function addParticipate(Participates $participate): self
    {
        if (!$this->participates->contains($participate)) {
            $this->participates[] = $participate;
            $participate->setMeetUp($this);
        }

        return $this;
    }

    public function removeParticipate(Participates $participate): self
    {
        if ($this->participates->contains($participate)) {
            $this->participates->removeElement($participate);
            // set the owning side to null (unless already changed)
            if ($participate->getMeetUp() === $this) {
                $participate->setMeetUp(null);
            }
        }

        return $this;
    }


}
