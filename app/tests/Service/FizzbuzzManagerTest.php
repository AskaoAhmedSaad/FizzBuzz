<?php

declare(strict_types=1);

namespace App\Tests\Service;

use App\Service\FizzbuzzManager;
use PHPUnit\Framework\TestCase;

/**
 * Class FizzbuzzManagerTest
 * @package App\Tests\Service
 */
class FizzbuzzManagerTest extends TestCase
{
    public function testMultiplesOfThree(): void
    {
        $fizzbuzzManager = new FizzbuzzManager();
        foreach ([3, 21, 33] as $number) {
            $result = $fizzbuzzManager->getOutputTxt($number);
            $this->assertSame("Fizz", $result);
        }
    }


    public function testMultiplesOfFive(): void
    {
        $fizzbuzzManager = new FizzbuzzManager();
        foreach ([5, 10, 55] as $number) {
            $result = $fizzbuzzManager->getOutputTxt($number);
            $this->assertSame("Buzz", $result);
        }
    }


    public function testMultiplesOfFifteen()
    {
        $fizzbuzzManager = new FizzbuzzManager();
        foreach ([15,60,90] as $number) {
            $result = $fizzbuzzManager->getOutputTxt($number);
            $this->assertSame("FizzBuzz", $result);
        }
    }


    public function testOtherNumbers()
    {
        $fizzbuzzManager = new FizzbuzzManager();
        foreach ([2, 4, 88] as $number) {
            $result = $fizzbuzzManager->getOutputTxt($number);
            $this->assertSame((string)$number, $result);
        }
    }

    /**
     * @dataProvider providerFizzbuzz
     */
    public function testFizzbuzz($number, $expected)
    {
        $fizzbuzzManager = new FizzbuzzManager();

        $this->assertSame($expected, $fizzbuzzManager->getOutputTxt($number));
    }

    /**
     * @return array[]
     */
    public function providerFizzbuzz()
    {
        return [
            [1,"1"],
            [7,"7"],
            [98,"98"],
            [3,"Fizz"],
            [12,"Fizz"],
            [33,"Fizz"],
            [5,"Buzz"],
            [65,"Buzz"],
            [85,"Buzz"],
            [15, "FizzBuzz"],
            [75, "FizzBuzz"],
            [30, "FizzBuzz"]
        ];
    }

    public function testFizzBuzzFrequency()
    {
        $limit = 100;
        $fizzbuzzManager = new FizzbuzzManager();

        $counter = 0;
        for ($number = 1; $number <= $limit; $number++) {
            $result = $fizzbuzzManager->getOutputTxt($number);

            if ($result == 'FizzBuzz') {
                $counter++;
            }
        }

        $this->assertSame((int)($limit / 15), $counter);
    }
}
