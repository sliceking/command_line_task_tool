<?php

namespace Acme;

use Acme\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AddCommand extends Command
{

    public function configure()
    {
        $this->setName('add')
            ->setDescription('add a new task')
            ->addArgument('description', InputArgument::REQUIRED);
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $description = $input->getArgument('description');

        $this->database->query(
            'insert into tasks(description) values(:description)',
            compact('description')
        );

        $output->writeln('<info>Task added</info>');

        $this->showTasks($output);
    }

}
