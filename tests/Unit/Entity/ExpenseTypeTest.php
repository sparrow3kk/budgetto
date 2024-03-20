<?php 

namespace App\Tests\Unit\Entity;
use App\Entity\ExpenseType;
use App\Entity\User;
use App\Entity\Expense;
use PHPUnit\Framework\TestCase;

class ExpenseTypeTest extends TestCase {

    public function testCanCreateExpenseType(): void {
        $expenseType = new ExpenseType();
        $this->assertInstanceOf(ExpenseType::class, $expenseType);
    }

    public function testCanGetAndSetExpenseType(): void {
        $expenseType = new ExpenseType();
        $expenseType->setExpenseTypeName('Food');
        $this->assertEquals('Food', $expenseType->getExpenseTypeName());
        $expenseType->setExpenseTypeName('Hobby');
        $this->assertEquals('Hobby', $expenseType->getExpenseTypeName());
    }

    public function testCanSetUserExpenseType():void {
        $expenseType = new ExpenseType();
        $user = new User();
        $expenseType->setExpenseTypeUser($user);
        $this->assertEquals($user, $expenseType->getExpenseTypeUser());
    }

    public function testCanAddAndRemoveExpense(): void {
        $expenseType = new ExpenseType();
        $expense = new Expense();
        $expenseType->addExpense($expense);
        $this->assertTrue($expenseType->getExpenses()->contains($expense));
        $expenseType->removeExpense($expense);
        $this->assertFalse($expenseType->getExpenses()->contains($expense));
        
        // $expense = new Expense();
        // $expenseType->addExpense($expense);
        // $this->assertTrue($expenseType->getExpenses()->contains($expense));
        
    }

    
}