<?php

namespace App\Entity;

use App\Repository\EmployeeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\OneToMany(targetEntity=MeetUp::class, mappedBy="organizer")
     */
    private ArrayCollection $meetUpsOrganized;

    public function __construct()
    {
        parent::__construct();
        $this->meetUpsOrganized = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|MeetUp[]
     */
    public function getMeetUpsOrganized(): Collection
    {
        return $this->meetUpsOrganized;
    }

    public function addMeetUpsOrganized(MeetUp $meetUpsOrganized): self
    {
        if (!$this->meetUpsOrganized->contains($meetUpsOrganized)) {
            $this->meetUpsOrganized[] = $meetUpsOrganized;
            $meetUpsOrganized->setOrganizer($this);
        }

        return $this;
    }

    public function removeMeetUpsOrganized(MeetUp $meetUpsOrganized): self
    {
        if ($this->meetUpsOrganized->contains($meetUpsOrganized)) {
            $this->meetUpsOrganized->removeElement($meetUpsOrganized);
            // set the owning side to null (unless already changed)
            if ($meetUpsOrganized->getOrganizer() === $this) {
                $meetUpsOrganized->setOrganizer(null);
            }
        }

        return $this;
    }
}
