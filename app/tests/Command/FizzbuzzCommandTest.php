<?php

declare(strict_types=1);

namespace App\Tests\Command;

use App\Command\FizzbuzzCommand;
use PHPUnit\Framework\TestCase;
use App\Service\FizzbuzzManager;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

/**
 * Class FizzbuzzCommandTest
 * @package App\Tests\Command
 */
class FizzbuzzCommandTest extends TestCase
{
    /**
     * @var FizzbuzzManager
     */
    private $fizzbuzzManagerMock;

    /**
     * @var CommandTester
     */
    private $commandTester;

    protected function setUp(): void
    {
        $this->fizzbuzzManagerMock = $this->createMock(FizzbuzzManager::class);

        $application = new Application();
        $application->add(new FizzbuzzCommand($this->fizzbuzzManagerMock));
        $command = $application->find('app:fizzbuzz');
        $this->commandTester = new CommandTester($command);
    }

    protected function tearDown(): void
    {
        $this->fizzbuzzManagerMock = null;
        $this->commandTester = null;
    }

    public function testExecuteSuccess()
    {
        $this->fizzbuzzManagerMock->expects($this->exactly(15))
            ->method('getOutputTxt')
            ->willReturn('1', '2', 'Fizz', '4', 'Buzz', 'Fizz', '7', '8', 'Fizz', 'Buzz', '11', 'Fizz', '13', '14', 'FizzBuzz');

        $this->assertEquals(1, $this->commandTester->execute(['-l' => 15]));

        $this->assertStringContainsString("
1
2
Fizz
4
Buzz
Fizz
7
8
Fizz
Buzz
11
Fizz
13
14
FizzBuzz
", $this->commandTester->getDisplay());
    }
}
