<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Form\MaxNumberType;

class ValueMaxCommand extends Command
{
    protected static $defaultName = 'value:max';

    protected function configure()
    {
        $this
            ->setDescription('Search max value')
            ->addArgument('arg1', InputArgument::REQUIRED, 'Argument description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $arg1 = intval($input->getArgument('arg1'));
        $functionMaxNumber = new MaxNumberType();
        $error = true;

        if ($arg1 && $arg1 > 0 && $arg1 <= 99999) {
            $maxValue = $functionMaxNumber->getMaxNumber($arg1);
            $io->success('Input value: '.$arg1.' | Max value: '.$maxValue);
            $error = false;
        } 

        if($error) {
            $io->error('Bad value :(');
        }

        return 0;
    }
}
