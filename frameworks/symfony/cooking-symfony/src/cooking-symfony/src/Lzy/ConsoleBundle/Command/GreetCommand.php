<?php

namespace Lzy\ConsoleBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class GreetCommand extends ContainerAwareCommand {

  protected function configure() {
    $this
      ->setName('lzy:greet')
      ->setDescription('Greet someone')
      ->addArgument(
        'name', InputArgument::OPTIONAL, "Who do you want to greet?"
      )
      ->addOption(
        "yell", NULL, InputOption::VALUE_NONE, "If set, the task will yell in uppercase"
      )
    ;
  }

  protected function execute(InputInterface $input, OutputInterface $output) {
    $name = $input->getArgument("name");
    $text = ($name) ? "Hello {$name}" : "Hello";
    $text = ($input->getOption("yell")) ? strtoupper($text) : $text;
    $output->writeln($text);
    
    /** @var \Psr\Log\LoggerInterface */
    $logger = $this->getContainer()->get('logger');
    $logger->info("Executing command for {$name}");
  }
}
