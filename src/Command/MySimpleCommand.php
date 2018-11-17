<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;

class MySimpleCommand extends Command
{
    protected static $defaultName = 'my:simpleCommand';

    protected function configure()
    {
        $this
            ->setDescription('To jest moja prosta komenda :).')
            ->addArgument('imie', InputArgument::REQUIRED, 'Imię osoby która uruchamia komendę.');
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $output->writeln('Hej! Witaj w mojej prostej konsolowej metodzie!');
        $output->writeln('Siemano ' . $input->getArgument('imie'));
	
		$helper = $this->getHelper('question');
		$question = new Question('Ile masz lat? ', 'wiek');
		$wiek = $helper->ask($input, $output, $question);
		
		$output->write('');
		$output->writeln('Ty '.$input->getArgument('imie').' masz lat: '.$wiek);
		$output->write(";)");
    }
}
