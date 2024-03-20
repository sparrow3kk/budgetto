<?php

namespace App\Tests\Unit\Entity;


use App\Entity\Income;
use App\Entity\IncomeType;
use App\Entity\User;
use PHPUnit\Framework\TestCase;


class IncomeTypeTest extends TestCase
{
    public function testCanCreateIncomeType(): void
    {
        $incomeType = new IncomeType();
        $this->assertInstanceOf(IncomeType::class, $incomeType);
    }


    public function testCanGetAndSetIncomeType(): void {
        $incomeType = new IncomeType();
        $incomeType->setIncomeTypeName('Salary');
        $this->assertEquals('Salary', $incomeType->getIncomeTypeName());
    }

    public function testCanSetUserIncomeType():void {
        $incomeType = new IncomeType();
        $user = new User();
        $incomeType->setIncomeTypeUser($user);
        $this->assertEquals($user, $incomeType->getIncomeTypeUser());
    }

    public function testCanAddAndRemoveIncome(): void
    {
        $incomeType = new IncomeType();
        $income = new Income();
        $incomeType->addIncome($income);
        $this->assertTrue($incomeType->getIncomes()->contains($income));
        $incomeType->removeIncome($income);
        $this->assertFalse($incomeType->getIncomes()->contains($income));
    }
}

