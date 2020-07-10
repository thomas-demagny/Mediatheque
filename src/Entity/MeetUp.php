<?php

namespace App\Entity;

use App\Repository\MeetUpRepository;
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


}
