<?php

namespace App\Entity;

use App\Repository\IncomeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IncomeRepository::class)]
class Income
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'incomes')]
    private ?User $income_user = null;

    #[ORM\ManyToOne(inversedBy: 'income_name')]
    private ?IncomeType $income_type = null;

    #[ORM\Column(length: 255)]
    private ?string $income_name = null;

    #[ORM\Column]
    private ?float $income_value = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIncomeUser(): ?User
    {
        return $this->income_user;
    }

    public function setIncomeUser(?User $income_user): static
    {
        $this->income_user = $income_user;

        return $this;
    }

    public function getIncomeType(): ?IncomeType
    {
        return $this->income_type;
    }

    public function setIncomeType(?IncomeType $income_type): static
    {
        $this->income_type = $income_type;

        return $this;
    }

    public function getIncomeName(): ?string
    {
        return $this->income_name;
    }

    public function setIncomeName(string $income_name): static
    {
        $this->income_name = $income_name;

        return $this;
    }

    public function getIncomeValue(): ?float
    {
        return $this->income_value;
    }

    public function setIncomeValue(float $income_value): static
    {
        $this->income_value = $income_value;

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
