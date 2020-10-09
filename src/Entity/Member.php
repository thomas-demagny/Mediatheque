<?php

namespace App\Entity;

use App\Repository\MemberRepository;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MemberRepository::class)
 */
class Member extends User {

    /**
     * @ORM\Column(type="date")
     */
    private ?DateTimeInterface $membershipDate;

    /**
     * @ORM\OneToMany(targetEntity=Borrowing::class, mappedBy="borrower")
     */
    private Collection $borrowings;

    public function __construct() {
        parent::__construct();
        $this->borrowings = new ArrayCollection();
    }


    public function getMembershipDate(): ?DateTimeInterface {
        return $this->membershipDate;
    }

    public function setMembershipDate(DateTimeInterface $membershipDate): self {
        $this->membershipDate = $membershipDate;

        return $this;
    }

    /**
     * @return Collection|Borrowing[]
     */
    public function getBorrowings(): Collection {
        return $this->borrowings;
    }

    public function addBorrowing(Borrowing $borrowing): self {
        if (!$this->borrowings->contains($borrowing)) {
            $this->borrowings[] = $borrowing;
            $borrowing->setBorrower($this);
        }

        return $this;
    }

    public function removeBorrowing(Borrowing $borrowing): self {
        if ($this->borrowings->contains($borrowing)) {
            $this->borrowings->removeElement($borrowing);
            // set the owning side to null (unless already changed)
            if ($borrowing->getBorrower() === $this) {
                $borrowing->setBorrower(null);
            }
        }

        return $this;
    }

}
























