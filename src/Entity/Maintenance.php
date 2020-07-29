<?php

namespace App\Entity;

use App\Repository\MaintenanceRepository;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MaintenanceRepository::class)
 */
class Maintenance
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\ManyToOne(targetEntity=Employee::class)
     */
    private ?Employee $maintainer;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class)
     */
    private ?Product $Product;

    /**
     * @ORM\Column(type="string", length=70)
     */
    private ?string $status;

    /**
     * @ORM\Column(type="datetime")
     */
    private ?DateTimeInterface $maintenanceDate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMaintainer(): ?Employee
    {
        return $this->maintainer;
    }

    public function setMaintainer(?Employee $maintainer): self
    {
        $this->maintainer = $maintainer;

        return $this;
    }

    public function getProduct(): ?Product
    {
        return $this->Product;
    }

    public function setProduct(?Product $Product): self
    {
        $this->Product = $Product;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getMaintenanceDate(): ?DateTimeInterface
    {
        return $this->maintenanceDate;
    }

    public function setMaintenanceDate(DateTimeInterface $maintenanceDate): self
    {
        $this->maintenanceDate = $maintenanceDate;

        return $this;
    }
}
