<?php

namespace Acme;

use Acme\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ShowCommand extends Command
{

    public function configure()
    {
        $this->setName('show')
            ->setDescription('Show all tasks');

    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->showTasks($output);
    }

}
