<?php

namespace App\Entity;

use App\Repository\CreatorRepository;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CreatorRepository::class)
 */
class Creator
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private ?string $first_name;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private ?string $last_name;

    /**
     * @ORM\Column(type="date")
     */
    private ?DateTimeInterface $birthDate;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private ?DateTimeInterface $deathDate;

    /**
     * @ORM\ManyToMany(targetEntity=Product::class, mappedBy="creator")
     */
    private $products;

    /**
     * @ORM\OneToMany(targetEntity=IsInvolvedIn::class, mappedBy="creator", orphanRemoval=true)
     */
    private $isInvolvedIns;

    public function __construct()
    {
        $this->products = new ArrayCollection();
        $this->isInvolvedIns = new ArrayCollection();
    }


    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    /**
     * @param string $first_name
     * @return $this
     */
    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    /**
     * @param string $last_name
     * @return $this
     */
    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getBirthDate(): ?DateTimeInterface
    {
        return $this->birthDate;
    }

    /**
     * @param DateTimeInterface $birthDate
     * @return $this
     */
    public function setBirthDate(DateTimeInterface $birthDate): self
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getDeathDate(): ?DateTimeInterface
    {
        return $this->deathDate;
    }

    /**
     * @param DateTimeInterface|null $deathDate
     * @return $this
     */
    public function setDeathDate(?DateTimeInterface $deathDate): self
    {
        $this->deathDate = $deathDate;

        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->addCreator($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->contains($product)) {
            $this->products->removeElement($product);
            $product->removeCreator($this);
        }

        return $this;
    }

    /**
     * @return Collection|IsInvolvedIn[]
     */
    public function getIsInvolvedIns(): Collection
    {
        return $this->isInvolvedIns;
    }

    public function addIsInvolvedIn(IsInvolvedIn $isInvolvedIn): self
    {
        if (!$this->isInvolvedIns->contains($isInvolvedIn)) {
            $this->isInvolvedIns[] = $isInvolvedIn;
            $isInvolvedIn->setCreator($this);
        }

        return $this;
    }

    public function removeIsInvolvedIn(IsInvolvedIn $isInvolvedIn): self
    {
        if ($this->isInvolvedIns->contains($isInvolvedIn)) {
            $this->isInvolvedIns->removeElement($isInvolvedIn);
            // set the owning side to null (unless already changed)
            if ($isInvolvedIn->getCreator() === $this) {
                $isInvolvedIn->setCreator(null);
            }
        }

        return $this;
    }


}
