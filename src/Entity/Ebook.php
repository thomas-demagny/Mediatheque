<?php

namespace App\Entity;

use App\Repository\EbookRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EbookRepository::class)
 */
class Ebook extends Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected ?int $id;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $pages;

    /**
     * @return int|null
     */
    public function getPages(): ?int
    {
        return $this->pages;
    }

    /**
     * @param int|null $pages
     */
    public function setPages(?int $pages): void
    {
        $this->pages = $pages;
    }
    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }
}
