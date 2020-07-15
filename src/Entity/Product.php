<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="value", type="string")
 * @ORM\DiscriminatorMap({ "product" = "Product", "audioBook" = "AudioBook", "book" = "Book", "cd" = "Cd", "dvd" = "Dvd", "eBook" = "Ebook", "journal" = "Journal", "resources" = "Resources"})
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private ?string $category;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $stock;

    /**
     * @ORM\ManyToMany(targetEntity=MeetUp::class, mappedBy="subject")
     */
    private ArrayCollection $meetUp;

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
    private ?int $ProductCode;

    /**
     * Product constructor.
     */
    public function __construct()
    {
        $this->meetUp = new ArrayCollection();
    }

    /**
     * @return int|null
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
        return $this->ProductCode;
    }

    public function setProductCode(int $ProductCode): self
    {
        $this->ProductCode = $ProductCode;

        return $this;
    }


}
