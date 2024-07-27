<?php

namespace App\Entity;

use App\Repository\ExpenseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExpenseRepository::class)]
class Expense
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'expenses')]
    private ?User $expense_user = null;

    #[ORM\ManyToOne(inversedBy: 'expenses')]
    private ?ExpenseType $expense_type = null;

    #[ORM\Column(length: 255)]
    private ?string $expense_name = null;

    #[ORM\Column]
    private ?float $expense_value = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getExpenseUser(): ?User
    {
        return $this->expense_user;
    }

    public function setExpenseUser(?User $expense_user): static
    {
        $this->expense_user = $expense_user;

        return $this;
    }

    public function getExpenseType(): ?ExpenseType
    {
        return $this->expense_type;
    }

    public function setExpenseType(?ExpenseType $expense_type): static
    {
        $this->expense_type = $expense_type;

        return $this;
    }

    public function getExpenseName(): ?string
    {
        return $this->expense_name;
    }

    public function setExpenseName(string $expense_name): static
    {
        $this->expense_name = $expense_name;

        return $this;
    }

    public function getExpenseValue(): ?float
    {
        return $this->expense_value;
    }

    public function setExpenseValue(float $expense_value): static
    {
        $this->expense_value = $expense_value;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }
}
