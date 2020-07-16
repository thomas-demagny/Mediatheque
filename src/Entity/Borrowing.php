<?php

namespace App\Entity;

use App\Repository\BorrowingRepository;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BorrowingRepository::class)
 */
class Borrowing extends Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected ?int $id;

    /**
     * @ORM\ManyToOne(targetEntity=Member::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private ?Member $borrower;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private ?Product $document;

    /**
     * @ORM\Column(type="datetime")
     */
    private ?DateTimeInterface $startDate;

    /**
     * @ORM\Column(type="datetime")
     */
    private ?DateTimeInterface $expectedReturnDate;

    /**
     * @ORM\Column(type="datetime")
     */
    private ?DateTimeInterface $effectiveReturnDate;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Member|null
     */
    public function getBorrower(): ?Member
    {
        return $this->borrower;
    }

    /**
     * @param Member|null $borrower
     * @return $this
     */
    public function setBorrower(?Member $borrower): self
    {
        $this->borrower = $borrower;

        return $this;
    }

    /**
     * @return Product|null
     */
    public function getDocument(): ?Product
    {
        return $this->document;
    }

    /**
     * @param Product|null $document
     * @return $this
     */
    public function setDocument(?Product $document): self
    {
        $this->document = $document;

        return $this;
    }

    /**
     * @return DateTimeInterface
     */
    public function getStartDate(): DateTimeInterface
    {
        return $this->startDate;
    }

    /**
     * @param DateTimeInterface $startDate
     * @return $this
     */
    public function setStartDate(DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getExpectedReturnDate(): ?DateTimeInterface
    {
        return $this->expectedReturnDate;
    }

    /**
     * @param DateTimeInterface $expectedReturnDate
     * @return $this
     */
    public function setExpectedReturnDate(DateTimeInterface $expectedReturnDate): self
    {
        $this->expectedReturnDate = $expectedReturnDate;

        return $this;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getEffectiveReturnDate(): ?DateTimeInterface
    {
        return $this->effectiveReturnDate;
    }

    /**
     * @param DateTimeInterface $effectiveReturnDate
     * @return $this
     */
    public function setEffectiveReturnDate(DateTimeInterface $effectiveReturnDate): self
    {
        $this->effectiveReturnDate = $effectiveReturnDate;

        return $this;
    }
}
