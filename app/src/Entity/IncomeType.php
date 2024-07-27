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

    /**
     * @var Collection<int, Income>
     */
    #[ORM\OneToMany(targetEntity: Income::class, mappedBy: 'incomes')]
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

    /**
     * @return Collection<int, Income>
     */
    public function getIncomes(): Collection
    {
        return $this->incomes;
    }

    public function addIncomeName(Income $incomeName): static
    {
        if (!$this->incomes->contains($incomeName)) {
            $this->incomes->add($incomeName);
            $incomeName->setIncomeType($this);
        }

        return $this;
    }

    public function removeIncomeName(Income $incomeName): static
    {
        if ($this->incomes->removeElement($incomeName)) {
            // set the owning side to null (unless already changed)
            if ($incomeName->getIncomeType() === $this) {
                $incomeName->setIncomeType(null);
            }
        }

        return $this;
    }
}
