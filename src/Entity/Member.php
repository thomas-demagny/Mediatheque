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
    private ?int $id;

    /**
     * @var string|null
     */
    private ?string $address;
    /**
     * @var string|null
     */
    private ?string $zipCode;

    /**
     * @var string|null
     */
    private ?string $city;

    /**
     * @var DateTimeInterface|null
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
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }


    /**
     * @param $address
     */
    public function setAddress($address): void
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }


    /**
     * @param $city
     */
    public function setCity($city): void
    {
        $this->city = $city;
    }

    /**
     * @param $zipCode
     */
    public function setZipCode($zipCode): void
    {
        $this->zipCode = $zipCode;
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












