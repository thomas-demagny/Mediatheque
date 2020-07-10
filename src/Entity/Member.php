<?php

namespace App\Entity;

use App\Repository\MemberRepository;
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
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $membershipDate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMembershipDate(): ?\DateTimeInterface
    {
        return $this->membershipDate;
    }

    public function setMembershipDate(\DateTimeInterface $membershipDate): self
    {
        $this->membershipDate = $membershipDate;

        return $this;
    }
}
