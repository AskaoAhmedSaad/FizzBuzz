<?php

declare(strict_types=1);

namespace App\Command;

use App\Service\FizzbuzzManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Class FizzbuzzCommand
 * @package App\Command
 */
class FizzbuzzCommand extends Command
{
    /**
     * @var FizzbuzzManager
     */
    public FizzbuzzManager $fizzbuzzManager;

    /**
     * @var string
     */
    protected static $defaultName = 'app:fizzbuzz';

    /**
     * FizzbuzzCommand constructor.
     * @param FizzbuzzManager $fizzbuzzManager
     */
    public function __construct(FizzbuzzManager $fizzbuzzManager)
    {
        parent::__construct();

        $this->fizzbuzzManager = $fizzbuzzManager;
    }


    protected function configure()
    {
        $this->setDescription('fizzbuzz game!')
            ->setDefinition([
                new InputOption('limit', 'l', InputOption::VALUE_REQUIRED, 'max number', 100)]);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $io->title('run FizzBuzz');

        $limit = (int) $input->getOption('limit');

        for ($number = 1; $number <= $limit; $number++) {
            $outputTxt = $this->fizzbuzzManager->getOutputTxt($number);
            $output->writeln($outputTxt);
        }

        $io->success('successfully printed!');
        return 1;
    }
}
