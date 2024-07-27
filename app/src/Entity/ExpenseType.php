<?php

namespace App\Entity;

use App\Repository\ExpenseTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExpenseTypeRepository::class)]
class ExpenseType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $expense_type_name = null;

    /**
     * @var Collection<int, Expense>
     */
    #[ORM\OneToMany(targetEntity: Expense::class, mappedBy: 'expense_type')]
    private Collection $expenses;

    public function __construct()
    {
        $this->expenses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getExpenseTypeName(): ?string
    {
        return $this->expense_type_name;
    }

    public function setExpenseTypeName(string $expense_type_name): static
    {
        $this->expense_type_name = $expense_type_name;

        return $this;
    }

    /**
     * @return Collection<int, Expense>
     */
    public function getExpenses(): Collection
    {
        return $this->expenses;
    }

    public function addExpense(Expense $expense): static
    {
        if (!$this->expenses->contains($expense)) {
            $this->expenses->add($expense);
            $expense->setExpenseType($this);
        }

        return $this;
    }

    public function removeExpense(Expense $expense): static
    {
        if ($this->expenses->removeElement($expense)) {
            // set the owning side to null (unless already changed)
            if ($expense->getExpenseType() === $this) {
                $expense->setExpenseType(null);
            }
        }

        return $this;
    }
}
