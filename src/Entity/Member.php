<?php

namespace App\Entity;

use App\Repository\MemberRepository;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MemberRepository::class)
 */
class Member
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private ?DateTimeInterface $membershipDate;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getMembershipDate(): ?DateTimeInterface
    {
        return $this->membershipDate;
    }

    /**
     * @param DateTimeInterface $membershipDate
     * @return $this
     */
    public function setMembershipDate(DateTimeInterface $membershipDate): self
    {
        $this->membershipDate = $membershipDate;

        return $this;
    }
}
