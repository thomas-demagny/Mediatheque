<?php

namespace App\Entity;

use App\Repository\MemberRepository;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MemberRepository::class)
 */
class Member extends User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected ?int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $address;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $zipCode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $city;


    /**
     * @ORM\Column(type="date")
     */
    private ?DateTimeInterface $membershipDate;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    public function setZipCode(string $zipCode): self
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getMembershipDate(): ?DateTimeInterface
    {
        return $this->membershipDate;
    }

    public function setMembershipDate(DateTimeInterface $membershipDate): self
    {
        $this->membershipDate = $membershipDate;

        return $this;
    }


}
























