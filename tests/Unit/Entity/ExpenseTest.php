<?php 

namespace Tests\Unit\Entity;
use App\Entity\Expense;
use App\Entity\ExpenseType;
use App\Entity\User;
use PHPUnit\Framework\TestCase;
use DateTimeImmutable;

class ExpenseTest extends TestCase { 

    public function testCanCreateExpense(): void {
        $expense = new Expense();
        $user = new User();
        $expenseType = new ExpenseType();
        
        $expense->setExpenseUser($user);
        $expense->setExpenseType($expenseType);
        $expense->setExpenseName('Rent');
        $expense->setExpenseValue(1000);
        $expense->setExpenseCreatedAt(new DateTimeImmutable('2021-01-01'));
        
        $this->assertInstanceOf(Expense::class, $expense);
        $this->assertEquals('Rent', $expense->getExpenseName());
        $this->assertEquals(1000, $expense->getExpenseValue());
        $this->assertEquals(new DateTimeImmutable('2021-01-01'), $expense->getExpenseCreatedAt());
        $this->assertEquals($expenseType, $expense->getExpenseType());
        $this->assertEquals($user, $expense->getExpenseUser());
    }

    public function testCanGetAndSetExpenseName(): void {
        $expense = new Expense();
        $expense->setExpenseName('Rent');
        $this->assertEquals('Rent', $expense->getExpenseName());
    }

    public function testCanGetAndSetExpenseValue(): void {
        $expense = new Expense();
        $expense->setExpenseValue(1000);
        $this->assertEquals(1000, $expense->getExpenseValue());
    }

    public function testCanGetAndSetExpenseCreatedAt(): void {
        $expense = new Expense();
        $expense->setExpenseCreatedAt(new DateTimeImmutable('2021-01-01'));
        $this->assertEquals(new DateTimeImmutable('2021-01-01'), $expense->getExpenseCreatedAt());
    }

    public function testCanGetAndSetExpenseType(): void {
        $expense = new Expense();
        $expenseType = new ExpenseType();
        $expense->setExpenseType($expenseType);
        $this->assertEquals($expenseType, $expense->getExpenseType());
    }

    public function testCanSetUserExpense(): void {
        $expense = new Expense();
        $user = new User();
        $expense->setExpenseUser($user);
        $this->assertEquals($user, $expense->getExpenseUser());
    }
}