<?php

use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase {
    public function testTwoSum() {
        $this->assertEquals([0, 1], (new Solution())->twoSum([2, 7, 11, 15], 9));
    }

    public function testTwoSum2() {
        $this->assertEquals([1, 2], (new Solution())->twoSum([3, 2, 4], 6));
    }

    public function testTwoSum3() {
        $this->assertEquals([0, 1], (new Solution())->twoSum([3, 3], 6));
    }

    public function testTwoSum4() {
        $this->assertEquals([-1, -1], (new Solution())->twoSum([3, 3], 7));
    }
}
