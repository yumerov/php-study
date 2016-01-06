<?php

use Yumerov\phpstudy\Calculator;

class CalculatorTest extends PHPUnit_Framework_TestCase {

    /**
     * @param $arg
     * @dataProvider correctArgumentCheckingDataProvider
     */
    public function testArgumentChecking($arg)
    {
        Calculator::checkArgument($arg);
    }

    /**
     * @param $arg
     * @dataProvider wrongArgumentCheckingDataProvider
     * @expectedException \InvalidArgumentException
     */
    public function testArgumentCheckingWithWrongData($arg)
    {
        Calculator::checkArgument($arg);
    }

    /**
     * @depends testArgumentChecking
     */
    public function testConstructor()
    {
        $calculator = new Calculator(3);
        $actualResult = $calculator->getResult();
        $expectedResult = 3;

        $this->assertEquals($expectedResult, $actualResult);
    }

    /**
     * @depends testConstructor
     */
    public function testAdd()
    {
        $calculator = new Calculator();
        $actualResult = $calculator
            ->add(2)
            ->add(3)
            ->getResult()
        ;
        $expectedResult = 5;
        $this->assertEquals($expectedResult, $actualResult);
    }

    /**
     * @depends testAdd
     */
    public function testMinus()
    {
        $calculator = new Calculator(8);
        $actualResult = $calculator
            ->minus(6)
            ->getResult()
        ;
        $expectedResult = 2;
        $this->assertEquals($expectedResult, $actualResult);
    }

    public function testOutput()
    {
        $this->expectOutputString('Result: 5');
        $calculator = new Calculator(5);
        echo 'Result: ' . $calculator->getResult();
    }

    public function testIncomplete()
    {
        $this->markTestIncomplete("This test is incomplete");
    }

    public function testSkip()
    {
        $this->markTestSkipped("This test is skipped.");
    }

    /**
     * @return array
     */
    public function correctArgumentCheckingDataProvider()
    {
        return [[2], [8.9], [-9]];
    }

    /**
     * @return array
     */
    public function wrongArgumentCheckingDataProvider()
    {
        return [
            ['string'],
            [[1, 2, 3, 4]],
        ];
    }

}
