<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="value", type="string")
 * @ORM\DiscriminatorMap({ "product" = "Product", "audioBook" = "AudioBook", "book" = "Book", "cd" = "Cd", "dvd" = "Dvd", "eBook" = "Ebook", "journal" = "Journal", "resources" = "Resources"})
 */
abstract class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected ?int $id;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private ?string $category;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $stock;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $format;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $productCode;

    /**
     * @ORM\OneToMany(targetEntity=IsInvolvedIn::class, mappedBy="product", orphanRemoval=true, cascade="persist")
     */
    private Collection $isInvolvedIns;

    public function __construct()
    {
        $this->isInvolvedIns = new ArrayCollection();
    }




    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }

    /**
     * @param string $category
     * @return $this
     */
    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getStock(): ?int
    {
        return $this->stock;
    }

    /**
     * @param int $stock
     * @return $this
     */
    public function setStock(int $stock): self
    {
        $this->stock = $stock;

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

    public function getFormat(): ?string
    {
        return $this->format;
    }

    public function setFormat(string $format): self
    {
        $this->format = $format;

        return $this;
    }

    public function getProductCode(): ?int
    {
        return $this->productCode;
    }

    public function setProductCode(int $productCode): self
    {
        $this->productCode = $productCode;

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
            $isInvolvedIn->setProduct($this);
        }

        return $this;
    }

    public function removeIsInvolvedIn(IsInvolvedIn $isInvolvedIn): self
    {
        if ($this->isInvolvedIns->contains($isInvolvedIn)) {
            $this->isInvolvedIns->removeElement($isInvolvedIn);
            // set the owning side to null (unless already changed)
            if ($isInvolvedIn->getProduct() === $this) {
                $isInvolvedIn->setProduct(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->title;
    }

}
