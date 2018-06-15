<?php

namespace Acme;

use Acme\Command;
use Acme\DatabaseAdapter;
use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Output\OutputInterface;

class Command extends SymfonyCommand
{

    protected $database;

    public function __construct(DatabaseAdapter $database)
    {

        $this->database = $database;

        parent::__construct();
    }

    protected function showTasks(OutputInterface $output)
    {

        if (!$tasks = $this->database->fetchAll('tasks')) {
            return $output->writeln("<info>No tasks at the moment</info>");
        }
        $table = new Table($output);

        $table->setHeaders(['Id', 'Description'])
            ->setRows($tasks)
            ->render();
    }

}
