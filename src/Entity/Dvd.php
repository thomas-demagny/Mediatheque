<?php

namespace App\Entity;

use App\Repository\DvdRepository;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DvdRepository::class)
 */
class Dvd extends Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected ?int $id;

    /**
     * @return DateTimeInterface|null
     */
    public function getDuration(): ?DateTimeInterface
    {
        return $this->duration;
    }

    /**
     * @param DateTimeInterface|null $duration
     */
    public function setDuration(?DateTimeInterface $duration): void
    {
        $this->duration = $duration;
    }

    /**
     * @ORM\Column(type="time")
     */
    private ?DateTimeInterface $duration;
    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }
}
