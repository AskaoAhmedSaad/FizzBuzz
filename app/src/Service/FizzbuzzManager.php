<?php

declare(strict_types=1);

namespace App\Service;

/**
 * Class FizzbuzzManager
 * @package App\Service
 */
class FizzbuzzManager
{
    /**
     * @param int $number
     */
    public function getOutputTxt(int $number): string
    {
        if ($number % 15 == 0) {
            return 'FizzBuzz';
        } elseif ($number % 3 == 0) {
            return 'Fizz';
        } elseif ($number % 5 == 0) {
            return 'Buzz';
        }

        return (string) $number;
    }
}
