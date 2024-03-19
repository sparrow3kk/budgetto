<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_EMAIL', fields: ['email'])]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180)]
    private ?string $email = null;

    /**
     * @var list<string> The user roles
     */
    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\OneToMany(targetEntity: IncomeType::class, mappedBy: 'income_type_user')]
    private Collection $incomeTypes;

    #[ORM\OneToMany(targetEntity: Income::class, mappedBy: 'income_user')]
    private Collection $incomes;

    #[ORM\OneToMany(targetEntity: ExpenseType::class, mappedBy: 'expense_type_user')]
    private Collection $expenseTypes;

    #[ORM\OneToMany(targetEntity: Expense::class, mappedBy: 'expense_user')]
    private Collection $expenses;

    public function __construct()
    {
        $this->incomeTypes = new ArrayCollection();
        $this->incomes = new ArrayCollection();
        $this->expenseTypes = new ArrayCollection();
        $this->expenses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     *
     * @return list<string>
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @return Collection<int, IncomeType>
     */
    public function getIncomeTypes(): Collection
    {
        return $this->incomeTypes;
    }

    public function addIncomeType(IncomeType $incomeType): static
    {
        if (!$this->incomeTypes->contains($incomeType)) {
            $this->incomeTypes->add($incomeType);
            $incomeType->setIncomeTypeUser($this);
        }

        return $this;
    }

    public function removeIncomeType(IncomeType $incomeType): static
    {
        if ($this->incomeTypes->removeElement($incomeType)) {
            // set the owning side to null (unless already changed)
            if ($incomeType->getIncomeTypeUser() === $this) {
                $incomeType->setIncomeTypeUser(null);
            }
        }

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
            $income->setIncomeUser($this);
        }

        return $this;
    }

    public function removeIncome(Income $income): static
    {
        if ($this->incomes->removeElement($income)) {
            // set the owning side to null (unless already changed)
            if ($income->getIncomeUser() === $this) {
                $income->setIncomeUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ExpenseType>
     */
    public function getExpenseTypes(): Collection
    {
        return $this->expenseTypes;
    }

    public function addExpenseType(ExpenseType $expenseType): static
    {
        if (!$this->expenseTypes->contains($expenseType)) {
            $this->expenseTypes->add($expenseType);
            $expenseType->setExpenseTypeUser($this);
        }

        return $this;
    }

    public function removeExpenseType(ExpenseType $expenseType): static
    {
        if ($this->expenseTypes->removeElement($expenseType)) {
            // set the owning side to null (unless already changed)
            if ($expenseType->getExpenseTypeUser() === $this) {
                $expenseType->setExpenseTypeUser(null);
            }
        }

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
            $expense->setExpenseUser($this);
        }

        return $this;
    }

    public function removeExpense(Expense $expense): static
    {
        if ($this->expenses->removeElement($expense)) {
            // set the owning side to null (unless already changed)
            if ($expense->getExpenseUser() === $this) {
                $expense->setExpenseUser(null);
            }
        }

        return $this;
    }
}
