<?php

namespace App\Entity;

use App\Repository\AudioBookRepository;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AudioBookRepository::class)
 */
class AudioBook
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\Column(type="time")
     */
    private ?DateTimeInterface $duration;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDuration(): ?DateTimeInterface
    {
        return $this->duration;
    }

    public function setDuration(DateTimeInterface $duration): self
    {
        $this->duration = $duration;

        return $this;
    }
}
