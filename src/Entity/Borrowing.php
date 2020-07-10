<?php

namespace App\Entity;

use App\Repository\BorrowingRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BorrowingRepository::class)
 */
class Borrowing
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Member::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $borrower;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $document;

    /**
     * @ORM\Column(type="datetime")
     */
    private $startDate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $expectedReturnDate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $effectiveReturnDate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBorrower(): ?Member
    {
        return $this->borrower;
    }

    public function setBorrower(?Member $borrower): self
    {
        $this->borrower = $borrower;

        return $this;
    }

    public function getDocument(): ?Product
    {
        return $this->document;
    }

    public function setDocument(?Product $document): self
    {
        $this->document = $document;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getExpectedReturnDate(): ?\DateTimeInterface
    {
        return $this->expectedReturnDate;
    }

    public function setExpectedReturnDate(\DateTimeInterface $expectedReturnDate): self
    {
        $this->expectedReturnDate = $expectedReturnDate;

        return $this;
    }

    public function getEffectiveReturnDate(): ?\DateTimeInterface
    {
        return $this->effectiveReturnDate;
    }

    public function setEffectiveReturnDate(\DateTimeInterface $effectiveReturnDate): self
    {
        $this->effectiveReturnDate = $effectiveReturnDate;

        return $this;
    }
}
