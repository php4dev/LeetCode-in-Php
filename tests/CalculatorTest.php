<?php
namespace Tests;
use PHPUnit\Framework\TestCase;
use Projects\Maths\Calculator;
/**
 * Class CalculatorTest.
 */
class CalculatorTest extends TestCase
{
    /**
     * Calculator class instance
     *
     * @var \Projects\Maths\Calculator
     */
    private $calc;
    public function __construct()
    {
        $this->calc = new Calculator();
        parent::__construct();
    }
    public function testInstanceCalculator()
    {
        $this->assertInstanceOf(Calculator::class, $this->calc);
    }
    public function testAdd()
    {
        $value = $this->calc->add(2, 3);
        $this->assertEquals($value, 5);
    }
    public function testMultiply()
    {
        $value = $this->calc->multiply(2, 3);
        $this->assertEquals($value, 6);
    }
    public function testSubtract()
    {
        $value = $this->calc->subtract(4, 2);
        $this->assertEquals($value, 2);
    }
    public function testNormalDivide()
    {
        $value = $this->calc->divide(4, 2);
        $this->assertEquals($value, 2);
    }
    public function testDivisorCanNotBeZero()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->calc->divide(4, 0);
    }
}