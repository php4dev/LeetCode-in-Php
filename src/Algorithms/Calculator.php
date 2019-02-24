<?php
namespace Projects\Maths;
/**
 * Class Calculator.
 */
class Calculator
{
    /**
     * Add two numbers.
     *
     * @param $x
     * @param $y
     *
     * @return mixed
     */
    public function add($x, $y)
    {
        return $x + $y;
    }
    /**
     * Multiply two numbers.
     *
     * @param $x
     * @param $y
     *
     * @return mixed
     */
    public function multiply($x, $y)
    {
        return $x * $y;
    }
    /**
     * Subtract two numbers.
     *
     * @param $x
     * @param $y
     *
     * @return mixed
     */
    public function subtract($x, $y)
    {
        return $x - $y;
    }
    /**
     * Divide two numbers.
     *
     * @param $x
     * @param $y
     *
     * @return float
     */
    public function divide($x, $y)
    {
        if ($y === 0) {
            throw new \InvalidArgumentException("The divisor cannot be zero!");
        }
        return $x / $y;
    }
}