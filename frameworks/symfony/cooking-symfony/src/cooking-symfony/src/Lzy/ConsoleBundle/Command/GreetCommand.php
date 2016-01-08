<?php

namespace Lzy\ConsoleBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class GreetCommand extends ContainerAwareCommand {

  const ARGUMENT_NAME = 'name';
  const ARGUMENT_DESCRIPTION = 'Who do you want to greet?';
  const OPTION_NAME = 'yell';
  const OPTION_DESCRIPTION = "If set, the task will yell in uppercase";
  
  protected function configure() {
    $this
      ->setName('lzy:greet')
      ->setDescription('Greet someone')
      ->addArgument(
        self::ARGUMENT_NAME, InputArgument::OPTIONAL, self::ARGUMENT_DESCRIPTION
      )
      ->addOption(
        self::OPTION_NAME, NULL, InputOption::VALUE_NONE, self::OPTION_DESCRIPTION
      )
    ;
  }

  protected function execute(InputInterface $input, OutputInterface $output) {
    $name = $input->getArgument(self::ARGUMENT_NAME);
    $text = ($name) ? "Hello {$name}" : "Hello";
    $text = ($input->getOption(self::OPTION_NAME)) ? strtoupper($text) : $text;
    $output->writeln($text);
    
    /** @var \Psr\Log\LoggerInterface */
    $logger = $this->getContainer()->get('logger');
    $logger->info("Executing command for {$name}");
  }
}
