<?php

namespace App\Entity;

use App\Repository\EmployeeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmployeeRepository::class)
 */
class Employee extends User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected ?int $id;

    /**
     * @ORM\ManyToOne(targetEntity=MeetUp::class)
     */
    private ?MeetUp $organizes;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrganizes(): ?MeetUp
    {
        return $this->organizes;
    }

    public function setOrganizes(?MeetUp $organizes): self
    {
        $this->organizes = $organizes;

        return $this;
    }
}
