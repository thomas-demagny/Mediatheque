<?php

namespace App\Entity;

use App\Repository\AudioBookRepository;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=AudioBookRepository::class)
 */
class AudioBook extends Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected ?int $id;

    /**
     * @ORM\Column(type="time")
     * 
     * @Assert\Type("time")
     * @Assert\NotBlank
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
