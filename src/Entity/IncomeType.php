<?php

namespace App\Entity;

use App\Repository\IncomeTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IncomeTypeRepository::class)]
class IncomeType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $income_type_name = null;

    #[ORM\ManyToOne(inversedBy: 'incomeTypes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $income_type_user = null;

    #[ORM\OneToMany(targetEntity: Income::class, mappedBy: 'income_type')]
    private Collection $incomes;

    public function __construct()
    {
        $this->incomes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIncomeTypeName(): ?string
    {
        return $this->income_type_name;
    }

    public function setIncomeTypeName(string $income_type_name): static
    {
        $this->income_type_name = $income_type_name;

        return $this;
    }

    public function getIncomeTypeUser(): ?User
    {
        return $this->income_type_user;
    }

    public function setIncomeTypeUser(?User $income_type_user): static
    {
        $this->income_type_user = $income_type_user;

        return $this;
    }

    /**
     * @return Collection<int, Income>
     */
    public function getIncomes(): Collection
    {
        return $this->incomes;
    }

    public function addIncome(Income $income): static
    {
        if (!$this->incomes->contains($income)) {
            $this->incomes->add($income);
            $income->setIncomeType($this);
        }

        return $this;
    }

    public function removeIncome(Income $income): static
    {
        if ($this->incomes->removeElement($income)) {
            // set the owning side to null (unless already changed)
            if ($income->getIncomeType() === $this) {
                $income->setIncomeType(null);
            }
        }

        return $this;
    }
}
