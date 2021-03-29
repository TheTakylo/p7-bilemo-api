<?php

namespace App\Entity;

use App\Repository\CustomerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CustomerRepository::class)
 */
class Customer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $companyName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Ãpassword;

    /**
     * @ORM\OneToMany(targetEntity=CustomerUser::class, mappedBy="customer", orphanRemoval=true)
     */
    private $customerUsers;

    public function __construct()
    {
        $this->customerUsers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function setCompanyName(string $companyName): self
    {
        $this->companyName = $companyName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getÃpassword(): ?string
    {
        return $this->Ãpassword;
    }

    public function setÃpassword(string $Ãpassword): self
    {
        $this->Ãpassword = $Ãpassword;

        return $this;
    }

    /**
     * @return Collection|CustomerUser[]
     */
    public function getCustomerUsers(): Collection
    {
        return $this->customerUsers;
    }

    public function addCustomerUser(CustomerUser $customerUser): self
    {
        if (!$this->customerUsers->contains($customerUser)) {
            $this->customerUsers[] = $customerUser;
            $customerUser->setCustomer($this);
        }

        return $this;
    }

    public function removeCustomerUser(CustomerUser $customerUser): self
    {
        if ($this->customerUsers->removeElement($customerUser)) {
            // set the owning side to null (unless already changed)
            if ($customerUser->getCustomer() === $this) {
                $customerUser->setCustomer(null);
            }
        }

        return $this;
    }
}
