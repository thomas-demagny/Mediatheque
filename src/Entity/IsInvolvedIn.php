<?php

namespace App\Entity;

use App\Repository\IsInvolvedInRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=IsInvolvedInRepository::class)
 */
class IsInvolvedIn
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="isInvolvedIns")
     * @ORM\JoinColumn(nullable=false)
     */
    private ?Product $product;

    /**
     * @ORM\ManyToOne(targetEntity=Creator::class, inversedBy="isInvolvedIns")
     * @ORM\JoinColumn(nullable=false)
     */
    private ?Creator $creator;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $role;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getCreator(): ?Creator
    {
        return $this->creator;
    }

    public function setCreator(?Creator $creator): self
    {
        $this->creator = $creator;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }
}
