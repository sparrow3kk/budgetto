<?php 

namespace Tests\Unit\Entity;
use App\Entity\Income;
use App\Entity\IncomeType;
use App\Entity\User;
use PHPUnit\Framework\TestCase;
use DateTimeImmutable;


class IncomeTest extends TestCase { 

    public function testCanCreateIncome(): void {
        $income = new Income();
        $user = new User();
        $incomeType = new IncomeType();
        
        $income->setIncomeUser($user);
        $income->setIncomeType($incomeType);
        $income->setIncomeName('Salary');
        $income->setIncomeValue(1000);
        $income->setIncomeCreatedAt(new DateTimeImmutable('2021-01-01'));
        
        $this->assertInstanceOf(Income::class, $income);
        $this->assertEquals('Salary', $income->getIncomeName());
        $this->assertEquals(1000, $income->getIncomeValue());
        $this->assertEquals(new DateTimeImmutable('2021-01-01'), $income->getIncomeCreatedAt());
        $this->assertEquals($incomeType, $income->getIncomeType());
        $this->assertEquals($user, $income->getIncomeUser());
    }

    public function testCanGetAndSetIncomeName(): void {
        $income = new Income();
        $income->setIncomeName('Salary');
        $this->assertEquals('Salary', $income->getIncomeName());
    }

    public function testCanGetAndSetIncomeValue(): void {
        $income = new Income();
        $income->setIncomeValue(1000);
        $this->assertEquals(1000, $income->getIncomeValue());
    }

    public function testCanGetAndSetIncomeCreatedAt(): void {
        $income = new Income();
        $income->setIncomeCreatedAt(new DateTimeImmutable('2021-01-01'));
        $this->assertEquals(new DateTimeImmutable('2021-01-01'), $income->getIncomeCreatedAt());
    }

    public function testCanGetAndSetIncomeType(): void {
        $income = new Income();
        $incomeType = new IncomeType();
        $income->setIncomeType($incomeType);
        $this->assertEquals($incomeType, $income->getIncomeType());
    }

    public function testCanSetUserIncome(): void {
        $income = new Income();
        $user = new User();
        $income->setIncomeUser($user);
        $this->assertEquals($user, $income->getIncomeUser());
    }
}