<?php

namespace Lzy\ConsoleBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class StyleCommand extends ContainerAwareCommand {

  const COMMAND_NAME = 'lzy:style';
  const ARGUMENT_NAME = 'name';
  const ARGUMENT_DESCRIPTION = 'Who do you want to greet?';
  const OPTION_NAME = 'yell';
  const OPTION_DESCRIPTION = "If set, the task will yell in uppercase";

  protected function configure() {
    $this
      ->setName(self::COMMAND_NAME)
    ;
  }

  protected function execute(InputInterface $input, OutputInterface $output) {
    $io = new SymfonyStyle($input, $output);
    $io->title("Title");

    $io->section("Text section");
    $io->text([
      'Lorem ipsum dolor sit amet',
      'Consectetur adipiscing elit',
      'Aenean sit amet arcu vitae sem faucibus porta',
    ]);

    $io->section("List section");
    $io->listing([
      'Element #1 Lorem ipsum dolor sit amet',
      'Element #2 Lorem ipsum dolor sit amet',
      'Element #3 Lorem ipsum dolor sit amet',
    ]);

    $io->section("Table section");
    $io->table(['Header 1', 'Header 2'], [
      ['Cell 1-1', 'Cell 1-2'],
      ['Cell 2-1', 'Cell 2-2'],
      ['Cell 3-1', 'Cell 3-2'],
    ]);

    $io->section("Notes and cautions");
    $io->note([
      'Lorem ipsum dolor sit amet',
      'Consectetur adipiscing elit',
      'Aenean sit amet arcu vitae sem faucibus porta',
    ]);
    $io->caution('Lorem ipsum dolor sit amet');
    
    $io->section("Progress bar");
    $io->progressStart(20);
    sleep(2);
    $io->progressAdvance(5);
    sleep(2);
    $io->progressAdvance(10);
    sleep(2);
    $io->progressAdvance(15);
    sleep(2);
    $io->progressFinish();
    
    $io->section("Inputs");
    $io->ask("Was is dein Name?", "default", function ($name) {
      if (strlen($name) < 5) {
        throw new \RuntimeException("The name cannot be under 5 symbols.");
      }
      
      return $name;
    });
    
    $io->confirm("Bist du fertig");
    
    $io->choice("1, 2 or 3?", ['1', '2', '3']);
    
    $io->section("Results");
    $io->success("Success");
    $io->warning("Warning");
    $io->error("Error");
  }

}
